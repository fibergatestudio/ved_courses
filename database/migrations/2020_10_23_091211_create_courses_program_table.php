<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoursesProgramTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses_program', function (Blueprint $table) {
            $table->id();
            $table->string('course_id')->nullable();
            $table->longText('course_name')->nullable();
            $table->longText('course_description')->nullable();
            $table->string('learning_time')->nullable();

            // Протокол
            $table->boolean('show_protocol')->default(false);
            $table->longText('course_protocol_descr')->nullable();
            $table->string('learning_protocol_time')->nullable();
            $table->json('add_document')->nullable();

            // Видеоколекция
            $table->json('video_name')->nullable();
            $table->json('video_length')->nullable();
            $table->json('video_file')->nullable();
            $table->json('video_link')->nullable();

            // 3D модель
            $table->string('model3d_link')->nullable();

            // Тест
            $table->string('test_id')->nullable();

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
        Schema::dropIfExists('courses_program');
    }
}
