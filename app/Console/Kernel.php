<?php

namespace App\Console;

use Carbon\Carbon;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        \App\Console\Commands\ExportTranslationsToCsv::class,
        \App\Console\Commands\ImportTranslationsFromCsv::class,
        \App\Console\Commands\UpdateIcoProgress::class,
        \App\Console\Commands\UpdateIcoTxns::class,
        \App\Console\Commands\ExportContributorsForCountry::class,
        \App\Console\Commands\ExportUsersWithoutKYC::class,
        \App\Console\Commands\GenerateRefundEntries::class,
        \App\Console\Commands\RetrieveTokenAndContributionAmounts::class,
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // Start running the command 1 day before ICO and run for extra day after it ends
        $schedule->command('ico:update-progress')->everyMinute()->when(function() {
            $start = Carbon::createFromTimestamp(env('ICO_STARTS_AT'));
            $end = Carbon::createFromTimestamp(env('ICO_ENDS_AT'));

            return $start->subDay()->isPast() && $end->addDay()->isFuture();
        });
        $schedule->command('ico:update-txns');
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
