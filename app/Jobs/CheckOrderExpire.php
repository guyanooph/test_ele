<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use App\Models\Orders;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class CheckOrderExpire implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    
    /**
     * The order id. 
     * @var int
     * orderid
     */
     public $orderid;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($orderid)
    {
        //
        $this->orderid = $orderid;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        //
        $order = Orders::find($this->orderid);
        if($order->status === 0){
            $order->status = 5;
            $order->save();
        }
    }
}
