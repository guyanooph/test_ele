<?php

namespace App\Listeners;

use App\Events\CheckOrderExpire;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class CheckOrderListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  CheckOrderExpire  $event
     * @return void
     */
    public function handle(CheckOrderExpire $event)
    {
        //
        $orderid = $event->orderid;
    }
}
