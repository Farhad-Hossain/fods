<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGlobalSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('global_settings', function (Blueprint $table) {
            $table->id();
            $table->string('app_name');
            $table->text('short_description');
            $table->string('app_logo')->nullable();
            $table->tinyInteger('theme_color')->comment('1=Dark, 2=Light');
            $table->string('navbar_color');
            $table->string('contact_email');
            $table->string('contact_phone')->nullable();
            $table->string('contact_address')->nullable();
            $table->integer('default_delivery_charge')->comment('In percentage');
            $table->integer('default_product_selling_percentage')->comment('The system revinue from food selling');
            $table->tinyInteger('app_status')->default(1)->comment('1.Live 2.Not in Live');
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
        Schema::dropIfExists('globar_settings');
    }
}
