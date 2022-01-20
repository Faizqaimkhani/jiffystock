<?php

namespace App\Listeners;

use App\Events\EmailVerifiedEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendAccountToAdminForVerification
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
     * @param  \App\Events\EmailVerifiedEvent  $event
     * @return void
     */
    public function handle(EmailVerifiedEvent $event)
    {
        $event->user->badge_verification_status = 1;
        $event->user->save();
    }
}
