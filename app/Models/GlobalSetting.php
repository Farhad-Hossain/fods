<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GlobalSetting extends Model
{
    protected $table = "global_settings";

    protected $fillable = [
        'app_name',
        'short_description',
        'app_logo',
        'theme_color',
        'navbar_color',
        'contact_email',
        'contact_phone',
        'contact_address',
        'default_delivery_charge',
        'default_product_selling_percentage',
        'app_status',
        'country',
        'city',
    ];
}
