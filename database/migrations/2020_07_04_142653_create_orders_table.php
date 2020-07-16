<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('order_id', 64)->nullable()->comment('unique order id');
            $table->integer('user_id')->unsigned()->comment('who order this');
            /*$table->integer('restaurant_id')->unsigned()->comment('restaurant id ');
            $table->integer('food_id')->unsigned()->comment('food id');*/
            $table->decimal('sub_total', 10, 2)->comment('Sub total amount of order');
            $table->decimal('total_discount', 10, 2)->comment('total discount amount of this order');
            $table->decimal('payable_amount', 10, 2)->comment('payable amount of this order');
            $table->decimal('paid_amount', 10, 2)->default(0);
            $table->tinyInteger('order_status')->comment('1 = pending');
            $table->tinyInteger('payment_status')->comment('0=pending, 1=done');
            $table->integer('payment_reference')->unsigned()->nullable()->comment('Payment reference from payment details table');
            $table->integer('payment_type')->unsigned()->nullable()->comment('payment type');
            $table->integer('user_address_id')->unsigned()->nullable();
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
        Schema::dropIfExists('orders');
    }
}