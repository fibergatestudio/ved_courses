<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students_data', function (Blueprint $table) {
            $table->id();
            $table->string('upload_date')->nullable();
            $table->string('status_from')->nullable();
            $table->string('ID_FO')->nullable();
            $table->string('recipient')->nullable();
            $table->string('birthday')->nullable();
            $table->string('gender')->nullable();
            $table->string('citizenship')->nullable();
            $table->string('specialty')->nullable();
            $table->string('reason_for_deduction')->nullable();
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
        Schema::dropIfExists('students_data');
    }
}
