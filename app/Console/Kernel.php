<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Register the commands for the application.
     */
    protected function commands(): void
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }

    protected function schedule(Schedule $schedule): void
    {
        $schedule->command('SendBirthdayGreetings')->dailyAt('9:00');
    }

    protected array $middlewareGroups = [
        'web' => [
            \App\Http\Middleware\SetLocale::class,
        ],
    ];

}
