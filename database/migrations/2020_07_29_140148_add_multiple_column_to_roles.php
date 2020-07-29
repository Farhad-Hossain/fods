<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddMultipleColumnToRoles extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('roles', function (Blueprint $table) {
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
            
            $table->tinyInteger('see_order_list')->unsigned()->default(0);
            
            $table->tinyInteger('global_setting')->unsigned()->default(0);
            $table->tinyInteger('user_management')->unsigned()->default(0);


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('roles', function (Blueprint $table) {
            //
        });
    }
}
