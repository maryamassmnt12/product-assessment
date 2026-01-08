<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Broadcasting\Events\BroadcastSubscribed;
use Illuminate\Broadcasting\Events\BroadcastUnsubscribed;
use App\Models\Admin;
use App\Models\Customer;
use Log;

class PresenceChannelListener
{
    /**
     * Handle the event.
     */

     public function handle($event)
    {
        $user = $event->user;

        if (! $user) {
            return;
        }

        $isOnline = $event instanceof BroadcastSubscribed;

        if ($user instanceof Admin || $user instanceof Customer) {
            $user->update([
                'is_online' => $isOnline,
            ]);
        }

        Log::info('Presence channel event', [
            'user_type' => class_basename($user),
            'user_id'   => $user->id,
            'online'    => $isOnline,
        ]);
    }
    // public function handle($event)
    // {
    //     $user = $event->user;

    //     if($user instanceof Admin) {
    //         $user->update(['is_online' => $event instanceof BroadcastSubscribed]);
    //     }

    //     if($user instanceof Customer) {
    //         $user->update(['is_online' => $event instanceof BroadcastSubscribed]);
    //     }

    //     \Log::info('Presence event', [
    //         'user_id' => $event->user->id,
    //         'event' => class_basename($event),
    //     ]);
    // }
}
