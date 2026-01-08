<?php

namespace App\Providers;

// use Illuminate\Support\ServiceProvider;
// use Illuminate\Support\Facades\Event;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Broadcasting\Events\BroadcastSubscribed;
use Illuminate\Broadcasting\Events\BroadcastUnsubscribed;
use App\Listeners\PresenceChannelListener;

class EventServiceProvider extends ServiceProvider
{

    protected $listen = [
        BroadcastSubscribed::class => [
            PresenceChannelListener::class,
        ],
        BroadcastUnsubscribed::class => [
            PresenceChannelListener::class,
        ],
    ];
    /**
     * Register services.
     */
    // public function register(): void
    // {
    //     //
    // }

    /**
     * Bootstrap services.
     */
    // public function boot(): void
    // {
    //     Event::listen(BroadcastSubscribed::class, [PresenceChannelListener::class, 'handle']);
    //     Event::listen(BroadcastUnsubscribed::class, [PresenceChannelListener::class, 'handle']);
    // }
}
