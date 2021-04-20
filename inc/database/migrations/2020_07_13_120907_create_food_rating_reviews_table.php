<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFoodRatingReviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('food_rating_reviews', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->integer('food_id');
            $table->integer('restaurant_id');
            $table->tinyInteger('count_stars');
            $table->mediumText('review_content');
            $table->ipAddress('ip');
            $table->tinyInteger('status')->default(1);
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
        Schema::dropIfExists('food_rating_reviews');
    }
}
