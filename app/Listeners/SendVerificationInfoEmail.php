<?php

namespace App\Listeners;

use App\Events\EmailVerifiedEvent;

use App\Notifications\AccountVerificationInfo;
use App\Models\User;

class SendVerificationInfoEmail
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
      $user = User::where('email', $event->user->email)->first();
      $user->notify(new AccountVerificationInfo());
    }
}
