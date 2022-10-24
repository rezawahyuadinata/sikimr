<?php

namespace App\Console;

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
        //
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('inspire')->hourly();
        // $schedule->command("command:get-profile")->dailyAt('08:15');
        // $schedule->command("command:get-profile")->dailyAt('12:15');
        // $schedule->command("command:get-profile")->dailyAt('16:15');
        // $schedule->command("command:get-kontrak")->dailyAt('08:15');
        // $schedule->command("command:get-kontrak")->dailyAt('12:15');
        // $schedule->command("command:get-kontrak")->dailyAt('16:15');
        // $schedule->command("command:get-perizinan")->dailyAt('08:15');
        // $schedule->command("command:get-perizinan")->dailyAt('12:15');
        // $schedule->command("command:get-perizinan")->dailyAt('16:15');
        // $schedule->command("command:get-permohonan-izin")->dailyAt('08:15');
        // $schedule->command("command:get-permohonan-izin")->dailyAt('12:15');
        // $schedule->command("command:get-permohonan-izin")->dailyAt('16:15');
        // $schedule->command("command:get-perencanaan-sipbj")->dailyAt('08:05');
        // $schedule->command("command:get-pemilihan-sipbj")->dailyAt('08:10');
        // $schedule->command("command:get-pelaksanaan-sipbj")->dailyAt('08:15');
        // $schedule->command("command:get-persiapan-sipbj")->dailyAt('08:20');
        // $schedule->command("command:get-review-sipbj")->dailyAt('08:50');
        $schedule->command("command:update-api-paket")->timezone('Asia/Jakarta')->dailyAt('00:00');
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__ . '/Commands');

        require base_path('routes/console.php');
    }
}
