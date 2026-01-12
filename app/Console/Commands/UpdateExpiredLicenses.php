<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\License;
use Carbon\Carbon;

class UpdateExpiredLicenses extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'licenses:update-expired';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update licenses that have expired';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $now = Carbon::now();

        $updated = License::where('status', '!=', 'expired')
            ->where('expiration_date', '<', $now)
            ->update(['status' => 'expired']);

        $this->info("Updated $updated licenses to expired.");
    }
}
