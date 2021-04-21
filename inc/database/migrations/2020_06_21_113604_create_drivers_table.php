<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDriversTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('drivers', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('photo')->nullable();
            $table->tinyInteger('city')->unsigned();
            $table->string('phone');
            $table->tinyInteger('have_bike')->comment('1.Yes 2.Buying soon');
            $table->integer('max_delivery_distance')->comment('In KM');
            $table->integer('earning_style')->comment('1.Per delivery 2.Monthly');
            $table->integer('registered_by')->comment('Issued by a ride sharing company. 1.Uber 2.Ola CLub 3.None')->default(1)->nullable();
            $table->tinyInteger('status')->comment('1.active, 2.Inactive')->default(1);
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
        Schema::dropIfExists('drivers');
    }
}
