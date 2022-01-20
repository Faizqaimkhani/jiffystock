<?php

namespace App\Listeners;

use App\Events\OrderStatusChangedEvent;
use App\Models\User;
use App\Models\Customers;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Notifications\SendStatusChangedNotification;

class SendStatusChangeNotification
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
     * @param  \App\Events\OrderStatusChangedEvent  $event
     * @return void
     */
    public function handle(OrderStatusChangedEvent $event)
    {
        foreach ($event->user_ids as $user_type => $user_id) {
          if($user_type == 'customer') {
            $user = Customers::find($user_id);
          }
          if($user_type == 'user') {
            $user = User::find($user_id);
          }
          $user->notify(new SendStatusChangedNotification($event->from_status,$event->to_status,$event->product));
        }
    }
}
