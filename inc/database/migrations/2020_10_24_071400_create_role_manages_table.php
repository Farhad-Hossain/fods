<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoleManagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('role_manages', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->unsigned()->nullable();
            $table->integer('role_id')->unsigned()->nullable();
            $table->tinyInteger('create_restaurant')->default(0);
            $table->tinyInteger('edit_restaurant')->default(0);

            $table->tinyInteger('create_admin')->default(0);
            $table->tinyInteger('edit_admin')->default(0);

            $table->tinyInteger('create_food')->default(0);
            $table->tinyInteger('edit_food')->default(0);

            $table->tinyInteger('create_driver')->unsigned()->default(0);
            $table->tinyInteger('edit_driver')->unsigned()->default(0);
            $table->tinyInteger('see_restaurant_sales_transaction')->unsigned()->default(0);
            $table->tinyInteger('make_restaurant_withdrawal')->unsigned()->default(0);
            $table->tinyInteger('restaurant_rating_review')->unsigned()->default(0);
            $table->tinyInteger('restaurant_tag')->unsigned()->default(0);
            

            $table->tinyInteger('create_cuisine')->unsigned()->default(0);
            $table->tinyInteger('food_category')->unsigned()->default(0);
            $table->tinyInteger('see_food_list')->unsigned()->default(0);
            $table->tinyInteger('extra_food')->unsigned()->default(0);
            $table->tinyInteger('food_rating_review')->unsigned()->default(0);
            
            
            $table->tinyInteger('global_setting')->unsigned()->default(0);
            $table->tinyInteger('user_management')->unsigned()->default(0);

            $table->tinyInteger('restaurant_management')->unsigned()->default(0);
            $table->tinyInteger('food_management')->unsigned()->default(0);
            $table->tinyInteger('order_management')->unsigned()->default(0);
            $table->tinyInteger('see_order_list')->unsigned()->default(0);
            $table->tinyInteger('order_status')->unsigned()->default(0);

            $table->tinyInteger('driver_management')->unsigned()->default(0);
            $table->tinyInteger('customer')->unsigned()->default(0);
            $table->tinyInteger('reporting')->unsigned()->default(0);
            $table->tinyInteger('setting')->unsigned()->default(0);
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
        Schema::dropIfExists('role_manages');
    }
}
