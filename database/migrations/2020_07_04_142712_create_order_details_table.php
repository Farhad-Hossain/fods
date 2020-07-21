<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('order_id')->comment('order_id from orders table');
            $table->unsignedInteger('user_id');
            $table->integer('restaurant_id')->unsigned()->comment('restaurant id');
            $table->integer('food_id')->unsigned()->comment('food id');
            $table->integer('appointed_driver_id')->unsigned();
            $table->decimal('price', 10, 2)->comment('Price amount of order');
            $table->decimal('discount', 10, 2)->comment('discount amount of this order');
            $table->decimal('payable_amount', 10, 2)->comment('payable amount of this order');
            $table->string('delivery_address', 255);
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
        Schema::dropIfExists('order_details');
    }
}
