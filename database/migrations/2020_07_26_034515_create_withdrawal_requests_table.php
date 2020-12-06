<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWithdrawalRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('withdrawal_requests', function (Blueprint $table) {
            $table->id();
            $table->tinyInteger('user_id')->unsigned();
            $table->string('payment_method')->comment('User Preferable payment method')->nullable();
            $table->integer('requested_amount')->unsigned();
            $table->text('user_remarks')->comment('Remarks from user')->nullable();
            $table->text('action_remarks')->comment('remarks from admin')->nullable();
            $table->unsignedTinyInteger('action_status')->comment('1: Pending 2: approved, 3: rejected')->default(1);
            $table->unsignedTinyInteger('action_taken_by')->comment('Admin user id')->nullable();
            $table->tinyInteger('status')->unsigned()->default(1);
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
        Schema::dropIfExists('withdrawal_requests');
    }
}



// action status ( 1: Pending 2: success, 3: rejected ) 
