<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuestionTagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('question_tags', function (Blueprint $table) {
            $table->primary(['tag_id','question_id']);
            $table->bigInteger('tag_id')->unsigned();
            $table->bigInteger('question_id')->unsigned();

            $table->foreign('tag_id')->references('tag_id')->on('tags');
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
        Schema::dropIfExists('question_tags');
    }
}
