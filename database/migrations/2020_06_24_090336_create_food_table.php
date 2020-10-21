<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFoodTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('food', function (Blueprint $table) {
            $table->id();
            $table->integer('restaurant_id')->unsigned()->comment('restaurant id from restaurants table');
            $table->integer('food_category_id')->unsigned()->comment('food_category_id from food_categories table');
            $table->string('food_name', 128)->comment('food name');
            $table->string('image1')->nullable()->comment('food image 1');
            $table->string('image2')->nullable()->comment('food image 2');
            $table->string('image3')->nullable()->comment('food image 3');
            $table->decimal('price', 10,2)->default(0)->comment('food price');
            $table->decimal('discount_price', 10,2)->default(0)->comment('Food Discount Price');
            $table->mediumText('description')->nullable()->comment('food description');
            $table->mediumText('ingredients')->nullable()->comment('food Ingredients');
            $table->string('unit', 32)->nullable()->comment('food unit');
            $table->integer('package_count')->default(0)->comment('Number of item per package');
            $table->decimal('weight', 10,2)->default(0)->comment('Weight of this food default unit is gramme (g)');
            $table->tinyInteger('featured')->default(0)->comment('1=featured, 0=not');
            $table->tinyInteger('deliverable_food')->default(0)->comment('1=deliverable, 0=not');
            $table->tinyInteger('status')->default(1)->comment('1=active,0=inactive');
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
        Schema::dropIfExists('food');
    }
}
