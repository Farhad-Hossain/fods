<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCountryToGlobalSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('global_settings', function (Blueprint $table) {
            $table->integer('country')->nallable();
            $table->integer('city')->nallable();
            $table->integer('currency')->nullable()->comment('Currency ID');
            $table->unsignedInteger('wallet_blocked_amount')->default(20)->comment('Blocked Amount for wallet. Used for withdrawing request');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('global_settings', function (Blueprint $table) {
            
        });
    }
}
