<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FoodComment extends Model
{
    protected $guarded = [];

    public function customer()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

    public function replies() 
    {
        return $this->hasMany('App\Models\FoodCommentReply', 'food_comment_id');
    }
}
