<?php

namespace App\Providers;

use Illuminate\Auth\Events\Registered;
use App\Events\EmailVerifiedEvent;
use App\Events\OrderStatusChangedEvent;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;
use App\Listeners\SendAccountToAdminForVerification;
use App\Listeners\SendVerificationInfoEmail;
use App\Listeners\SendStatusChangeNotification;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        OrderStatusChangedEvent::class => [
          SendStatusChangeNotification::class,
        ],
        EmailVerifiedEvent::class => [
          SendVerificationInfoEmail::class,
          SendAccountToAdminForVerification::class,
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
