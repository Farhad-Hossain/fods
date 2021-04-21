<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    protected $guarded = [];

    public function role()
    {
        return $this->hasOne('App\Models\Role', 'user_id', 'user_id')->first()->access_roles;
    }

}
