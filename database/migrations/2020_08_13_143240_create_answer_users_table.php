<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnswerUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('answer_users', function (Blueprint $table) {
            $table->primary(['user_id','answer_id']);

            $table->bigInteger('user_id')->unsigned();
            $table->bigInteger('answer_id')->unsigned();
            $table->unsignedBigInteger('question_id');

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('answer_id')->references('answer_id')->on('answers');
            $table->foreign('question_id')->references('question_id')->on('questions');
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
        Schema::dropIfExists('answer_users');
    }
}
