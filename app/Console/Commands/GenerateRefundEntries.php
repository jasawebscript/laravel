<?php

namespace App\Console\Commands;

use App\Refund;
use App\User;
use Carbon\Carbon;
use Illuminate\Console\Command;

class GenerateRefundEntries extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'ico:generate-refunds';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate refund entries for all users that are eligible for a refund';

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
        User::withWallet()->get()->each(function (User $user) {
            try {
                $result = app()->make('geoip')->country($user->ip);

                if($result instanceof \GeoIp2\Model\Country) {
                    $ipCountry = $result->country->isoCode;
                }
            }catch (\GeoIp2\Exception\AddressNotFoundException $e) {
                //
            }

            $refundableCountries = ['US', 'VI', 'UM', 'PR', 'AS', 'GU', 'MP'];

            $eligibleForARefund =
                // sign up checkbox added on commit 519c919dd7cf4be26ae7eee4e6f7dd2fb31eea5f
                $user->created_at->lt(Carbon::create(2017,12, 17, 8, 0, 0)) &&
                (in_array($ipCountry ?? '', $refundableCountries) || in_array($user->country ?? '', $refundableCountries));

            if($eligibleForARefund) {
                $refund = new Refund();
                $refund->tokens = 0;
                $refund->ether = 0;
                $refund->wallet = strtolower($user->wallet);

                $user->refunds()->save($refund);
                $this->line('Refund entry created: ' . $user->id);
            } else {
                $this->line('Not eligible for a refund: ' . $user->id);
            }
        });
    }
}
