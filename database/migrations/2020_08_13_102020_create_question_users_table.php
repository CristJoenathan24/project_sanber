<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
USE Illuminate\Support\Facades\DB;

class CreateQuestionUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('question_users', function (Blueprint $table) {
            $table->increments('question_user_id');
            $table->bigInteger('user_id')->unsigned();
            $table->bigInteger('question_id')->unsigned();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('question_id')->references('question_id')->on('questions');

            $table->primary(['user_id','question_user_id']);
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
        Schema::dropIfExists('question_users');
    }
}
