<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTestsDragDropTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tests_drag_drop', function (Blueprint $table) {
            $table->id();
            // Основная информация вопроса
            $table->string('question_name')->nullable();
            $table->string('question_text')->nullable();
            $table->string('default_score')->nullable(); 
            $table->string('test_comment')->nullable();
            // $table->string('answers_type')->nullable();
            // $table->string('number_answers')->nullable();
            // Варианты ответов
            $table->json('answers_json')->nullable();
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
        Schema::dropIfExists('tests_drag_drop');
    }
}
