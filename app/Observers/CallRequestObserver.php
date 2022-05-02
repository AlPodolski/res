<?php

namespace App\Observers;

use App\Models\CallRequest;

class CallRequestObserver
{
    /**
     * Handle the call request "created" event.
     *
     * @param  \App\Models\CallRequest  $callRequest
     * @return void
     */
    public function created(CallRequest $callRequest)
    {
        $callRequest->phone = preg_replace('/[^0-9]/', '',  $callRequest->phone);
    }

    /**
     * Handle the call request "updated" event.
     *
     * @param  \App\Models\CallRequest  $callRequest
     * @return void
     */
    public function updated(CallRequest $callRequest)
    {
        //
    }

    /**
     * Handle the call request "deleted" event.
     *
     * @param  \App\Models\CallRequest  $callRequest
     * @return void
     */
    public function deleted(CallRequest $callRequest)
    {
        //
    }

    /**
     * Handle the call request "restored" event.
     *
     * @param  \App\Models\CallRequest  $callRequest
     * @return void
     */
    public function restored(CallRequest $callRequest)
    {
        //
    }

    /**
     * Handle the call request "force deleted" event.
     *
     * @param  \App\Models\CallRequest  $callRequest
     * @return void
     */
    public function forceDeleted(CallRequest $callRequest)
    {
        //
    }
}
