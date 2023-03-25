<?php

namespace App\Observers;

use App\Models\Location;
use Illuminate\Support\Facades\Storage;

class LocationObserver
{
    /**
     * Handle the Location "created" event.
     */
    public function created(Location $location): void
    {
        //
    }

    /**
     * Handle the Location "updating" event.
     */
    public function updating(Location $location): void
    {
        //
    }

    /**
     * Handle the Location "updated" event.
     */
    public function updated(Location $location): void
    {
        //
    }

    /**
     * Handle the Location "deleting" event.
     */
    public function deleting(Location $location): void
    {
        Storage::disk('public')->delete($location->imgUrl);
    }

    /**
     * Handle the Location "deleted" event.
     */
    public function deleted(Location $location): void
    {
        //
    }

    /**
     * Handle the Location "restored" event.
     */
    public function restored(Location $location): void
    {
        //
    }

    /**
     * Handle the Location "force deleted" event.
     */
    public function forceDeleted(Location $location): void
    {
        //
    }
}
