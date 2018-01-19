<?php

namespace App\Console\Commands;

use App\User;
use Illuminate\Console\Command;

class ExportUsersWithoutKYC extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'ico:export-without-kyc';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Exports emails of users who contributed more than 5 ETH but have not completed KYC process';

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
        // Retrieve all users without KYC and with wallet
        $users = User::withoutIdentification()->withWallet()->get()->map(function (User $user) {
            // Normalize wallet address
            $user->wallet = strtolower($user->wallet);
            return $user;
        });

        // Retrieve transaction list
        $txns = cache()->get('ico-txns')->filter(function ($tx) {
            // Filter out failed and empty transactions
            return !$tx->isError && bccomp($tx->value, 0) === 1;
        })->map(function ($input) {
            // Normalize wallet address
            $input->from = strtolower($input->from);
            return $input;
        });

        $kycRequiredFrom = bcmul(5, bcpow(10, 18));

        $txns->groupBy('from')->map(function ($txns, $address) {
            // Calculate precise contributions for each user
            $contributionSum = 0;
            $txns->each(function ($tx) use (&$contributionSum) {
                $contributionSum = bcadd($contributionSum, $tx->value);
            });
            return $contributionSum;
        })->filter(function ($sum) use ($kycRequiredFrom) {
            // Filter out users with less than 5 ETH
            return bccomp($sum, $kycRequiredFrom) >= 0;
        })->map(function ($contribution, $address) use ($users) {
            // Assign wallets to users from the database
            return [
                'contribution' => $contribution,
                'user' => $users->where('wallet', $address)->first(),
            ];
        })->filter(function ($contributor) {
            // Filter out wallets that cannot be matched to an account without identification
            return $contributor['user'] instanceof User;
        })->each(function ($contributor) {
            $this->line($contributor['user']->email);
        });
    }
}
