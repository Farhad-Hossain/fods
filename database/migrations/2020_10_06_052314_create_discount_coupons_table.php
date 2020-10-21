<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDiscountCouponsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('discount_coupons', function (Blueprint $table) {
            $table->id();
            $table->string('area');
            $table->string('promo_code');
            $table->tinyInteger('promo_type')->comment('1.Flat rate  2.Percentage');
            $table->unsignedTinyInteger('discount_price');
            $table->date('valid_date')->nullable();
            $table->unsignedTinyInteger('applicable_for')->comment('1.All users 2.New Users');
            $table->unsignedTinyInteger('promo_code_limit');
            $table->unsignedTinyInteger('promo_code_limit_per_customer');
            $table->unsignedTinyInteger('promo_percentage_maximum_discount');
            $table->smallText('description')->nullable();
            $table->unsignedTinyInteger('selling_count')->default(0);
            $table->unsignedTinyInteger('status')->default(1);
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
        Schema::dropIfExists('discount_coupons');
    }
}
