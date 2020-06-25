<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExtraFoodTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('extra_food', function (Blueprint $table) {
            $table->id();
            $table->string('category')->comment('1.Vegeterian 2.Non-vegeterian');
            $table->string('name');
            $table->integer('price');
            $table->tinyInteger('status')->comment('1. Active 0.Inactive');
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
        Schema::dropIfExists('extra_food');
    }
}
