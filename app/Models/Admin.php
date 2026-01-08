<?php

namespace App\Models;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;

class Admin extends Authenticatable
{
    protected $table = 'admins';
    protected $fillable = [
        'name', 'email', 'email_verified_at', 'password'
    ];

    protected $hidden = ['password'];
}
