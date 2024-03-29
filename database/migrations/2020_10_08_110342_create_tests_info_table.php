<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTestsInfoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tests_info', function (Blueprint $table) {
            $table->id();
            // Общее
            $table->string('name')->nullable();
            $table->text('description')->nullable();
            // Выбор времени
            $table->string('start_date_time')->nullable();
            $table->string('end_date_time')->nullable();
            $table->string('time_limit')->nullable();
            $table->string('when_time_is_up')->nullable();
            // Оценка
            $table->string('passing_score')->nullable();
            // Макс оценка
            $table->string('max_score')->nullable();
            $table->string('available_attempts')->nullable();
            $table->string('assessment_method')->nullable();
            // Поведение вопросов
            $table->string('random_answers_order')->nullable();
            $table->string('getting_result')->nullable();
            // Разширенный ответ
            $table->json('extended_feedback')->nullable();
            // Общие настройки модуля
            $table->string('availability')->nullable();
            $table->string('operating_mode')->nullable();

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
        Schema::dropIfExists('tests_info');
    }
}
