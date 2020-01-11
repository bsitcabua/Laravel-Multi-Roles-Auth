<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $guarded = [];

    protected $hidden = ['password'];
    
    public function contacts()
    {
        return $this->hasMany('App\Contact', 'user_id');
    }

    public function userRole()
    {
        return $this->hasOne('App\UserRole', 'user_id');
    }

    // auth()->user()->role()->first()->name get role name
    public function role()
    {
        return $this->belongsToMany('App\Role','user_roles','user_id','role_id');
    }
    
}
