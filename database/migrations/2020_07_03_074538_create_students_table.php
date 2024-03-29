<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('user_id');
            //Информация о студенте
            $table->string('full_name')->nullable();
            $table->string('university_name')->nullable();
            $table->string('course_number')->nullable();
            $table->string('group_number')->nullable();
            $table->string('student_number')->nullable();
            $table->string('student_phone_number')->nullable();
            // // //
            //Привязанный учитель
            $table->string('assigned_teacher_id')->nullable();
            //
            $table->string('status')->nullable();
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
        Schema::dropIfExists('students');
    }
}
