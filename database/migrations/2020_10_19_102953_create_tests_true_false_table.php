<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTestsTrueFalseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tests_true_false', function (Blueprint $table) {
            $table->id();
            // Основная информация вопроса
            $table->string('question_name')->nullable(); 
            $table->string('question_text')->nullable();
            $table->string('default_score')->nullable();
            $table->string('test_comment')->nullable();

            //Ответы
            $table->string('right_answer')->nullable();
            $table->string('right_answer_comment')->nullable();
            $table->string('wrong_answer_comment')->nullable();
            // Варианты ответов
            //$table->json('answers_json')->nullable();
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
        Schema::dropIfExists('tests_true_false');
    }
}
