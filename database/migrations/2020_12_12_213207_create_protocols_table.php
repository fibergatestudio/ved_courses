<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProtocolsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('protocols', function (Blueprint $table) {
            $table->id();
            $table->string('course_id');
            $table->string('lesson_id');
            $table->string('user_id');
            $table->longText('city')->nullable();
            $table->date('date')->nullable();
            $table->char('hour_start', 2)->nullable();
            $table->char('minute_start', 2)->nullable();
            $table->char('hour_end', 2)->nullable();
            $table->char('minute_end', 2)->nullable();
            $table->longText('cop_initials')->nullable();
            $table->longText('basis_of')->nullable();
            $table->longText('witnessed_one')->nullable();
            $table->longText('witnessed_two')->nullable();
            $table->longText('victim')->nullable();
            $table->longText('suspect')->nullable();
            $table->longText('advocate')->nullable();
            $table->longText('representative')->nullable();
            $table->longText('specialist')->nullable();
            $table->longText('other_participant_one')->nullable();
            $table->longText('other_participant_two')->nullable();
            $table->longText('owner')->nullable();
            $table->longText('users_signs')->nullable();
            $table->longText('tech_devices')->nullable();
            $table->longText('recording_devs')->nullable();
            $table->longText('review_conducted')->nullable();
            $table->string('weather')->nullable();
            $table->string('day_time')->nullable();
            $table->string('lightning')->nullable();
            $table->string('approach_select')->nullable();
            $table->longText('address')->nullable();
            $table->longText('approach')->nullable();
            $table->string('ways_schemes_select')->nullable();
            $table->longText('ways_schemes')->nullable();
            $table->string('roads_select')->nullable();
            $table->longText('roads')->nullable();
            $table->string('streets_select')->nullable();
            $table->longText('streets')->nullable();
            $table->string('streets_elems_select')->nullable();
            $table->longText('streets_elems')->nullable();
            $table->longText('cameras_devs')->nullable();
            $table->string('house_select')->nullable();
            $table->longText('house')->nullable();
            $table->string('catering')->nullable();
            $table->longText('floor_others')->nullable();
            $table->longText('floor')->nullable();
            $table->string('stairs_elevators')->nullable();
            $table->longText('elevators_stairs')->nullable();
            $table->string('doors')->nullable();
            $table->longText('door_other')->nullable();
            $table->string('doorhandle')->nullable();
            $table->longText('doorhandle_other')->nullable();
            $table->string('door_device')->nullable();
            $table->longText('traces')->nullable();
            $table->string('mortise_lock')->nullable();
            $table->string('padlock')->nullable();
            $table->longText('lock_other')->nullable();
            $table->longText('rooms_count_size_texta')->nullable();
            $table->longText('rooms_corridor_texta')->nullable();
            $table->longText('break_or_not1')->nullable();
            $table->longText('bathroom_texta')->nullable();
            $table->longText('break_or_not2')->nullable();
            $table->longText('kitchen_texta')->nullable();
            $table->longText('break_or_not7')->nullable();
            $table->longText('rooms_descr1')->nullable();
            $table->longText('break_or_not3')->nullable();
            $table->longText('rooms_descr2')->nullable();
            $table->longText('break_or_not4')->nullable();
            $table->longText('rooms_descr3')->nullable();
            $table->longText('break_or_not5')->nullable();
            $table->longText('rooms_descr4')->nullable();
            $table->longText('break_or_not6')->nullable();
            $table->text('balcony')->nullable();
            $table->longText('traces_damage')->nullable();
            $table->longText('rooms_other_texta')->nullable();
            $table->longText('object_traces')->nullable();
            $table->longText('finger_traces')->nullable();
            $table->longText('shoes_traces')->nullable();
            $table->longText('vehicle_traces')->nullable();
            $table->longText('break_traces')->nullable();
            $table->longText('blood_traces')->nullable();
            $table->longText('micro_traces')->nullable();
            $table->longText('bio_traces')->nullable();
            $table->longText('other_traces')->nullable();
            $table->longText('p_add_plan')->nullable();
            $table->longText('p_add_plan_info')->nullable();
            $table->longText('p_signed')->nullable();
            $table->longText('participant1')->nullable();
            $table->longText('participant1_sign')->nullable();
            $table->longText('participant2')->nullable();
            $table->longText('participant2_sign')->nullable();
            $table->longText('participant3')->nullable();
            $table->longText('participant3_sign')->nullable();
            $table->longText('participant4')->nullable();
            $table->longText('participant4_sign')->nullable();
            $table->longText('participant5')->nullable();
            $table->longText('participant5_sign')->nullable();
            $table->longText('participant6')->nullable();
            $table->longText('participant6_sign')->nullable();
            $table->longText('witness1')->nullable();
            $table->longText('witness1_sign')->nullable();
            $table->longText('witness2')->nullable();
            $table->longText('witness2_sign')->nullable();
            $table->longText('survey_conducted')->nullable();
            $table->string('p_add_photo1')->nullable();
            $table->string('p_add_photo2')->nullable();
            $table->string('p_add_photo3')->nullable();
            $table->string('p_add_photo4')->nullable();
            $table->string('p_add_photo5')->nullable();
            $table->string('p_add_photo6')->nullable();
            $table->string('p_add_photo7')->nullable();
            $table->string('p_add_photo8')->nullable();
            $table->longText('photo_descr1')->nullable();
            $table->longText('photo_descr2')->nullable();
            $table->longText('photo_descr3')->nullable();
            $table->longText('photo_descr4')->nullable();
            $table->longText('photo_descr5')->nullable();
            $table->longText('photo_descr6')->nullable();
            $table->longText('photo_descr7')->nullable();
            $table->longText('photo_descr8')->nullable();
            $table->longText('investigator_photo_block1')->nullable();
            $table->longText('investigator_photo_block2')->nullable();
            $table->longText('investigator_photo_block3')->nullable();
            $table->longText('investigator_photo_block4')->nullable();
            $table->longText('investigator_photo_block5')->nullable();
            $table->longText('investigator_photo_block6')->nullable();
            $table->longText('investigator_photo_block7')->nullable();
            $table->longText('investigator_photo_block8')->nullable();
            $table->string('raiting')->nullable();
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
        Schema::dropIfExists('protocols');
    }
}
