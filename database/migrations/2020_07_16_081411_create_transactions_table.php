<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('transaction_by')->unsigned()->comment('The Who make this transaction');
            $table->unsignedInteger('transaction_to')->unsigned()->comment('To Whom this transaction');
            $table->string('transaction_id', 30);
            $table->tinyInteger('transaction_type')->unsigned()->comment('1:Customer Order 2.Driver Order 3.Restaurant Payout, 4.Driver Payout');
            $table->string('transaction_medium')->comment('Cash, bank, Online');
            $table->float('transaction_amount');
            $table->string('transaction_referance')->nullable();
            $table->string('transaction_description');
            $table->string('transaction_status');
            $table->timestamp('transaction_time');
            $table->ipAddress('ip_address');
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
        Schema::dropIfExists('transactions');
    }
}
