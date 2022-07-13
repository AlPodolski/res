<?php

namespace App\Listeners;

use App\Events\PayEvent;
use App\Models\History;

class PayListener
{
    /**
     * Handle the event.
     *
     * @param PayEvent $event
     * @return void
     */
    public function handle(PayEvent $event)
    {
        $history = new History();

        $history->user_id = $event->userId;
        $history->sum = $event->sum;
        $history->balance = $event->balance;
        $history->type = $event->type;

        $history->save();
    }
}
