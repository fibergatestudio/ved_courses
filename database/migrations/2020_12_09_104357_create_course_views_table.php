<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCourseViewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('course_views', function (Blueprint $table) {
            $table->id();
            $table->string('course_id');
            $table->string('course_name')->nullable();
            $table->string('url');
            $table->string('session_id');
            $table->string('user_id');
            $table->string('ip');
            $table->string('agent');
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
        Schema::dropIfExists('course_views');
    }
}
