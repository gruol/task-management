<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    protected $commands = [
       Commands\TaskUpdate::class
   ];
    /**
     * Define the application's command schedule.
     */
    protected function schedule(Schedule $schedule): void
    {
        // $schedule->command('inspire')->hourly();
          $schedule->command('task:update')
                ->everyFiveMinutes1();
                // ->pingOnSuccess($ulr); // URL will call on Success
                // ->pingOnFailure($ulr); // URL will Call on failure we can send email alart or logs alse on failure 
    }

    /**
     * Register the commands for the application.
     */
    protected function commands(): void
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
