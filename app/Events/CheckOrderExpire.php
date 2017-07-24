<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class CheckOrderExpire
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    
    /**
     *@var int
     *the order id;
     */
     public $orderid;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($orderid)
    {
        //
        $this->orderid = $orderid;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
