<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('roles', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->unsigned();
            $table->tinyInteger('create_restaurant')->default(0);
            $table->tinyInteger('edit_restaurant')->default(0);

            $table->tinyInteger('create_admin')->default(0);
            $table->tinyInteger('edit_admin')->default(0);

            $table->tinyInteger('create_food')->default(0);
            $table->tinyInteger('edit_food')->default(0);

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
        Schema::dropIfExists('roles');
    }
}
