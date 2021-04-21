<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRestaurantTimingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('restaurant_timings', function (Blueprint $table) {
            $table->id();
            $table->integer('restaurant_id');
            $table->string('day');
            $table->string('open_status');
            $table->string('time_from')->comment('AM Time');
            $table->string('time_to')->comment('PM Time');
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
        Schema::dropIfExists('restaurant_timings');
    }
}
