<?php

use App\Models\Admin;
use App\Models\Customer;
use Illuminate\Support\Facades\Broadcast;

// Broadcast::channel('App.Models.User.{id}', function ($user, $id) {
//     return (int) $user->id === (int) $id;
// });


Broadcast::channel('presence-online', function () {

    \Log::info('Broadcast auth', [
        'admin' => auth('admin')->check(),
        'customer' => auth('customer')->check(),
    ]);

    if (auth('admin')->check()) {
        $admin = auth('admin')->user();

        return [
            'id' => 'admin-'.auth('admin')->id(),
            'name' => auth('admin')->user()->name,
            'type' => 'admin',
        ];
    }

    if (auth('customer')->check()) {
        $customer = auth('customer')->user();

        return [
            'id' => 'customer-'.auth('customer')->id(),
            'name' => auth('customer')->user()->name,
            'type' => 'customer',
        ];
    }

    return false;
});

