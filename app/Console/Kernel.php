<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Komendy Artisan do zarejestrowania.
     */
    protected $commands = [
        \App\Console\Commands\UpdateExpiredLicenses::class,
    ];

    /**
     * Harmonogram zadań
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->command('licenses:update-expired')->daily();
    }

    /**
     * Rejestracja komend Artisan
     */
    protected function commands()
    {
        $this->load(__DIR__ . '/Commands');

        require base_path('routes/console.php');
    }
}
