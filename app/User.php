<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'role', 'email', 'password', 'password_salt', 'last_login_ip', 'status' 
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'id',
        'created_by',
        'updated_by',
        'role',
        'email_verified_at',
        'status',
        'last_login_ip',
        'created_at',
        'updated_at',
        'password',
        'password_salt',
        'remember_token',
        'api_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function customer()
    {
        return $this->hasOne('App\Models\Customer', 'user_id');
    }
    public function restaurant()
    {
        return $this->hasOne('App\Models\Restaurant', 'user_id');
    }
    public function restaurants()
    {
        return $this->hasMany('App\Models\Restaurant', 'user_id');
    }
    public function admin()
    {
        return $this->hasOne('App\Models\Admin', 'user_id');
    }
    public function role()
    {
        return $this->hasOne('App\Models\Role')->first()->access_roles;
    }
}
