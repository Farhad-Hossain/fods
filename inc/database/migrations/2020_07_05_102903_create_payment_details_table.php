<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payment_details', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->unsigned()->nullable();
            $table->string('tran_id', 128)->nullable();
            $table->string('val_id', 128)->nullable();
            $table->decimal('amount', 10,2)->default(0)->nullable();
            $table->string('card_type', 128)->nullable();
            $table->string('store_amount', 128)->nullable();
            $table->string('card_no', 128)->nullable();
            $table->string('bank_tran_id', 128)->nullable();
            $table->string('status', 128)->nullable();
            $table->string('tran_date', 128)->nullable();
            $table->string('currency', 128)->nullable();
            $table->string('card_issuer', 128)->nullable();
            $table->string('card_brand', 128)->nullable();
            $table->string('card_sub_brand', 128)->nullable();
            $table->string('card_issuer_country', 128)->nullable();
            $table->string('card_issuer_country_code', 128)->nullable();
            $table->string('store_id', 128)->nullable();
            $table->string('verify_sign', 128)->nullable();
            $table->string('currency_type', 128)->nullable();
            $table->string('currency_amount', 128)->nullable();
            $table->string('currency_rate', 128)->nullable();
            $table->string('base_fair', 128)->nullable();
            $table->string('risk_level', 128)->nullable();
            $table->string('risk_title', 128)->nullable();
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
        Schema::dropIfExists('payment_details');
    }
}
