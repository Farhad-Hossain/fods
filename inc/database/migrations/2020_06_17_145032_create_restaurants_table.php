<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRestaurantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('restaurants', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('name');
            $table->integer('city')->unsigned();
            $table->string('email');
            $table->string('phone');
            $table->string('website');
            $table->string('address');
            $table->string('characteristics');
            $table->tinyInteger('open_status')->comment('1.Open 2.Not open now');
            $table->tinyInteger('alcohol_status')->comment('1.available, 2.Unavailable');
            $table->tinyInteger('seating_status')->comment('1.Available 2.Unavailable');            
            $table->tinyInteger('payment_method')->comment('1.Cash Only, 2.Card Only, 3.Both');
            $table->integer('delivery_charge');
            $table->integer('delivery_time')->default(35);
            $table->integer('selling_percentage');
            $table->string('logo');
            $table->string('cover_photo');
            $table->tinyInteger('status')->default(1)->comment('1.Okey, 2.Deleted');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('restaurants');
    }
}
