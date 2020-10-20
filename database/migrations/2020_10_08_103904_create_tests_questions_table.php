<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTestsQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tests_questions', function (Blueprint $table) {
            $table->id();
            // Айди основного теста
            $table->string('test_id')->nullable();
            // Тип вопроса
            $table->string('question_type')->nullable();
            // Таблица - вопросов 
            $table->string('test_answers_id')->nullable();
            //$table->json('question_info_json')->nullable();
            // Ответ(Ы)
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
        Schema::dropIfExists('tests_questions');
    }
}
