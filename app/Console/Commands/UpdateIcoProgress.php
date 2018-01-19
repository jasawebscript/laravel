<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use GuzzleHttp\Client;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;

class UpdateIcoProgress extends Command
{

    protected $signature = 'ico:update-progress';
    protected $description = 'Retrieves ICO progress and stores the value in cache.';

    private $client;
    private $icoAddress;

    public function __construct()
    {
        parent::__construct();

        $this->client = new Client();
        $this->icoAddress = env('ICO_ADDRESS');
    }

    public function handle()
    {
        $soldBefore = Cache::get('tokens_sold');

        if (empty($this->icoAddress)) {
            $this->line('ICO address is not set.');
            return;
        }

        $response = $this->client->get('https://api.etherscan.io/api', [
            'query' => [
                'module' => 'proxy',
                'action' => 'eth_call',
                'to' => $this->icoAddress,
                'data' => env('ICO_CALL_DATA'),
                'tag' => 'latest',
                'apikey' => env('ETHERSCAN_API_KEY'),
            ],
            'timeout' => 30,
            'http_errors' => false,
        ]);

        $content = $response->getBody()->getContents();

        if ($response->getStatusCode() != 200) {
            $this->line('Could not retrieve the number of sold tokens: ' . $content);
            Log::error('Could not retrieve the number of sold tokens', [
                'status' => $response->getStatusCode(),
                'body' => $content,
            ]);
            return;
        }

        $response = json_decode($content);

        if(!isset($response->result)){
            $this->line('Etherscan returned results in an unknown format: '.$content);
            Log::error('Etherscan returned results in an unknown format', [
                'body' => $response,
            ]);
            return;
        }

        $tokensSold = preciseHexDec($response->result);

        Cache::forever('tokens_sold', [
            'time' => Carbon::now(),
            'amount' => $tokensSold,
        ]);

        $this->line('Done! Number of sold tokens on contract '.$this->icoAddress.' is '.$tokensSold.'. Difference: '.bcsub($tokensSold, $soldBefore['amount'] ?? 0));
    }

}