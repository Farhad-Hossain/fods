<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFoodCommentRepliesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('food_comment_replies', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('food_comment_id');
            $table->unsignedInteger('user_id');
            $table->text('reply_content');
            $table->unsignedTinyInteger('status');
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
        Schema::dropIfExists('food_comment_replies');
    }
}
