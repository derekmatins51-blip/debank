<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;

class Admin extends Authenticatable
{
    use HasFactory;
    protected $guard = 'admin';
    
    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $fillable = [
        'firstName',
        'lastName',
        'email',
        'password',
        'phone',
        'dashboard_style',
        'acnt_type_active',
        'status',
        'type',
    ];
}
