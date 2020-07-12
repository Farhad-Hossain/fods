<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Order extends Model
{
    protected $guard = [];


    public function user()
    {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }

    public static function getNewOrderId($id)
    {

        $order_id = "";
        if (Auth::check()) {
            $order_id = $order_id.Auth::id();
        }
        $order_id = $order_id."ORD".$id;
        return $order_id;
    }

    public function details()
    {
        return $this->hasOne('App\Models\OrderDetail', 'order_id');
    }
}
