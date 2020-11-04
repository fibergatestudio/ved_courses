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
            $table->string('course_description')->nullable(); 
            $table->string('learning_time')->nullable(); 
            
            // Протокол
            $table->string('course_protocol_descr')->nullable(); 
            $table->string('learning_protocol_time')->nullable(); 
            $table->string('add_document')->nullable(); 

            // Видеоколекция
            $table->string('video_name')->nullable(); 
            $table->string('video_length')->nullable(); 
            $table->string('video_file')->nullable(); 
            $table->string('video_link')->nullable(); 

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
