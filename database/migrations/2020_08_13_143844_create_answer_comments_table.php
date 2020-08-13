<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnswerCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('answer_comments', function (Blueprint $table) {
            $table->bigIncrements('answer_comment_id');
            $table->bigInteger('user_id')->unsigned();
            $table->bigInteger('answer_id')->unsigned();
            $table->string('comment');

            $table->foreign('user_id')->references('user_id')->on('answer_users');;
            $table->foreign('answer_id')->references('answer_id')->on('answer_users');
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
        Schema::dropIfExists('answer_comments');
    }
}
