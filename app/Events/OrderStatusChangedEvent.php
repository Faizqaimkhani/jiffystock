<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class OrderStatusChangedEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $user_ids;
    public $from_status;
    public $to_status;
    public $product;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($user_ids, $from_status, $to_status, $product)
    {
      $this->user_ids = $user_ids;
      $this->from_status = $from_status;
      $this->to_status = $to_status;
      $this->product = $product;
    }

}
