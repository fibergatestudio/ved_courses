<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFinishedTestsInfoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('finished_tests_info', function (Blueprint $table) {
            $table->id();
            $table->string('user_id');
            $table->string('test_id');
            $table->string('course_id');

            // Аррей с вопросами
            $table->json('test_questions_json');

            $table->string('total_score');
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
        Schema::dropIfExists('finished_tests_info');
    }
}
