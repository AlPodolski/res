<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class PayEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $sum;
    public $userId;
    public $type;
    public $balance;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($sum, $userId, $type, $balance)
    {
        $this->sum = $sum;
        $this->userId = $userId;
        $this->type = $type;
        $this->balance = $balance;
    }
}
