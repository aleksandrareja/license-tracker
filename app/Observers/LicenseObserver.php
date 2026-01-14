<?php

namespace App\Observers;

use Carbon\Carbon;
use App\Models\License;

class LicenseObserver
{
    /**
     * Handle the License "created" event.
     */
    public function created(License $license): void
    {
        //
    }

    /**
     * Handle the License "updated" event.
     */
    public function updated(License $license): void
    {
        //
    }

    /**
     * Handle the License "deleted" event.
     */
    public function deleted(License $license): void
    {
        //
    }

    /**
     * Handle the License "restored" event.
     */
    public function restored(License $license): void
    {
        //
    }

    /**
     * Handle the License "force deleted" event.
     */
    public function forceDeleted(License $license): void
    {
        //
    }

    public function saving(License $license){
        if (!$license->expiration_date) {
            return;
        }

        if (Carbon::now()->greaterThan($license->expiration_date)) {
            $license->status = 'expired';
        } else {
            // nie nadpisuj suspended
            if ($license->status !== 'suspended') {
                $license->status = 'active';
            }
        }
    }
}
