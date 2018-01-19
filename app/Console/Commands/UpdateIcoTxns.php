<?php

namespace App\Console\Commands;

use App\User;
use Carbon\Carbon;
use GuzzleHttp\Client;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class UpdateIcoTxns extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'ico:update-txns';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Retrieves ICO progress and stores the value in cache.';


    private $client;

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();

        $this->client = new Client();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $lastBlock = cache()->get('last-block', 0);
        $this->line('Retrieving transactions from block #'.$lastBlock);

        $response = $this->client->get('https://api.etherscan.io/api', [
            'query' => [
                'module' => 'account',
                'action' => 'txlist',
                'address' => env('ICO_ADDRESS'),
                'startblock' => $lastBlock,
                'endblock' => '999999999999990',
                'apikey' => env('ETHERSCAN_API_KEY'),
                'sort' => 'asc',
            ],
            'timeout' => 30,
            'http_errors' => false,
        ]);

        $content = $response->getBody()->getContents();

        if ($response->getStatusCode() != 200) {
            $this->line('Could not retrieve the transactions: ' . $content);
            Log::error('Could not retrieve the transactions', [
                'status' => $response->getStatusCode(),
                'body' => $content,
            ]);
            return;
        }

        $response = json_decode($content);

        if(!isset($response->result)) {
            $this->line('Etherscan returned results in an unknown format: ' . $content);
            Log::error('Etherscan returned results in an unknown format', [
                'body' => $response,
            ]);
            return;
        }

        $newTxns = collect($response->result)->filter(function($tx) {
            return $tx->isError == 0 && $tx->value != 0;
        })->keyBy('hash');

        $txns = cache()->get('ico-txns', collect([]))->merge($newTxns);

        cache()->forever('last-block', $txns->last()->blockNumber);
        cache()->forever('ico-txns', $txns);

        $this->line('Transactions updated.');

        $affiliates = User::withWallet()->whereNotNull('affiliate_id')->get()->groupBy('affiliate_id')->map(function($users, $affiliateId) use ($txns) {
            $contributed = 0;
            $contributedAfter = 0;

            $users = $users->map(function ($user) use ($txns, &$contributed, &$contributedAfter) {
                $userTxns = $txns->where('from', '=', $user->wallet);
                $user->contributed = $user->wallet ? $userTxns->sum('value'): 0;
                $user->contributed_after = $user->wallet && $user->wallet_updated_at instanceof Carbon ? $userTxns->where('timeStamp','>', $user->wallet_updated_at->timestamp)->sum('value'): 0;
                $contributed = bcadd($contributed, $user->contributed);
                $contributedAfter = bcadd($contributedAfter, $user->contributed_after);
                return $user;
            });

            $this->line("Iterating through affiliate ".$affiliateId." (".$users->count()." referrals)");

            return [
                'affiliate' => null,
                'users' => $users,
                'contributed' => $contributed,
                'contributed_after' => $contributedAfter,
                'estimated_commission' => $contributedAfter * 0.05 * 10000,
            ];
        })->sort(function($a, $b) {
            if($b['contributed_after'] > 0 || $a['contributed_after'] > 0) {
                return bccomp($b['contributed_after'],$a['contributed_after']);
            }
            return bccomp($b['contributed'],$a['contributed']);
        })->slice(0,10);

        User::whereIn('id', $affiliates->keys())->get()->each(function($affiliate) use ($affiliates) {
            $referralData = $affiliates->get($affiliate->id);
            $referralData['affiliate'] = $affiliate;
            $affiliates->put($affiliate->id, $referralData);
        });


        $this->line('Affiliates updated.');

        cache()->forever('ico-affiliates', $affiliates);

        // ETH price

        if (!cache()->has('eth-price-valid')) {
            try {
                $prices = [];
                foreach (json_decode(file_get_contents('https://v2.ethereumprice.org:8080/snapshot/eth/usd/waex/1m?_=1513933319177'))->data->timeseries as $input) {
                    list($ts, $price) = $input;
                    $prices[$dateStr = date('Y-m-d H', floor($ts / 1000))] = $price;
                    $this->line('Price updated: ' . $dateStr . ' = ' . $price . 'USD');
                }
                cache()->forever('eth-price-history', collect($prices));
                cache()->put('eth-price-valid', true, 30);
            } catch (\Exception $e) {
                $this->line('Price data could not be updated: ' . $e->getMessage());
            }
        }

    }
}
