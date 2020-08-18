<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRestaurantFavoritesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('restaurant_favorites', function (Blueprint $table) {
            $table->id();
            $table->integer('restaurant_id');
            $table->tinyInteger('star_count')->unsigned()->nullable();
            $table->mediumText('comment')->nullable();
            $table->tinyInteger('status');
            $table->ipAddress('ip');
            $table->integer('inserted_by')->nullable();
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
        Schema::dropIfExists('restaurant_favorites');
    }
}
