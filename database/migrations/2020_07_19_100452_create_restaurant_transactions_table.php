<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRestaurantTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('restaurant_transactions', function (Blueprint $table) {
            $table->id();
            $table->string('order_id')->nallable(); 
            $table->string('user_id'); 
            $table->string('transaction_id');
            $table->integer('transaction_amount')->unsigned();
            $table->tinyInteger('credit_debit')->unsigned()->default(1)->comment('1:Credit, 2:Debit');
            $table->string('method')->nullable();
            $table->tinyInteger('status')->unsigned()->default(1);
            $table->ipAddress('ip_address');
            $table->ipAddress('description');
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
        Schema::dropIfExists('restaurant_transactions');
    }
}
