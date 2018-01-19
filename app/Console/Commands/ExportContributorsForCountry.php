<?php

namespace App\Console\Commands;

use App\User;
use Illuminate\Console\Command;

class ExportContributorsForCountry extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'ico:export-contributors {countries} {--pretend}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Exports ICO contributors for given (comma separated) countries';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $geoIP = $result = app()->make('geoip');
        $pretend = $this->option('pretend');

        $txns = cache()->get('ico-txns')->filter(function ($tx) {
            return !$tx->isError && bccomp($tx->value, 0) === 1;
        })->map(function ($input) {
            $input->from = strtolower($input->from);
            return $input;
        });
        $wallets = $txns->pluck('from')->unique();

        $countries = array_map(function ($countryCode) {
            return trim(strtoupper($countryCode));
        }, explode(",", $this->argument('countries')));

        if ($pretend) {
            $this->line('Filtering for the following countries: ' . implode(', ', $countries));
            $this->line($wallets->count() . ' wallets successfully contributed in ICO');
        }

        $users = User::whereNotNull('wallet')->get()->filter(function ($user) use (
            $wallets,
            $countries,
            $geoIP,
            $pretend
        ) {
            $userWallet = strtolower($user->wallet);
            $userCountry = $user->country ? trim(strtoupper($user->country)) : '';

            // Reject wallets that have not contributed in ICO
            if (!in_array($userWallet, $wallets->toArray())) {
                if ($pretend) {
                    $this->line($user->id . ' ' . $user->email . ' rejected because wallet ' . $userWallet . ' did not participate in ICO');
                }
                return false;
            }

            // Include users that manually specified their country
            if (in_array($userCountry, $countries)) {
                if ($pretend) {
                    $this->line($user->id . ' ' . $user->email . ' included because user specified their country as ' . $userCountry);
                }
                return true;
            }

            // Include users whose GEOIP matches requested countries
            if (!empty($user->ip)) {
                try {
                    $result = $geoIP->country($user->ip);

                    if ($result instanceof \GeoIp2\Model\Country) {
                        $currentCountry = $result->country->isoCode;

                        if (in_array($currentCountry, $countries)) {
                            if ($pretend) {
                                $this->line($user->id . ' ' . $user->email . ' included because user specified their IP resolved to ' . $currentCountry);
                            }
                            return true;
                        }
                    }
                } catch (\GeoIp2\Exception\AddressNotFoundException $e) {
                    // Cannot identify country from IP address
                    if ($pretend) {
                        $this->line('GeoIP failed for IP ' . $user->ip . ' (reason: ' . $e->getMessage() . ')');
                    }
                }
            }

            return false;
        });

        if ($pretend) {
            $this->line($users->count() . ' users matched');
            $totalContributions = '0';

            foreach ($users as $user) {
                $txns->where('from', '=', strtolower($user->wallet))->each(function ($tx) use (&$totalContributions) {
                    $totalContributions = bcadd($tx->value, $totalContributions);
                });
            }

            $this->line('Contributions of all users: ' . bcdiv($totalContributions, bcpow(10, 18), 4) . ' ETH');
        } else {
            echo implode(PHP_EOL, $users->pluck('email')->toArray());
        }
    }
}
