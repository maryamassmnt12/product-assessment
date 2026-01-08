<?php

namespace App\Models;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;

class Customer extends Authenticatable
{
    protected $table = 'customers';
    protected $fillable = [
        'name', 'email', 'email_verified_at', 'password'
    ];

    protected $hidden = ['password'];
}
