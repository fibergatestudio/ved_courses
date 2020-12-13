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
            $table->longText('city')->nullable();
            $table->date('date')->nullable();
            $table->char('hour-start', 2)->nullable();
            $table->char('minute-start', 2)->nullable();
            $table->char('hour-end', 2)->nullable();
            $table->char('minute-end', 2)->nullable();
            $table->longText('cop-initials')->nullable();
            $table->longText('basis-of')->nullable();
            $table->longText('witnessed-one')->nullable();
            $table->longText('witnessed-two')->nullable();
            $table->longText('victim')->nullable();
            $table->longText('suspect')->nullable();
            $table->longText('advocate')->nullable();
            $table->longText('representative')->nullable();
            $table->longText('specialist')->nullable();
            $table->longText('other-participant-one')->nullable();
            $table->longText('other-participant-two')->nullable();
            $table->longText('owner')->nullable();
            $table->longText('users-signs')->nullable();
            $table->longText('tech-devices')->nullable();
            $table->longText('recording-devs')->nullable();
            $table->longText('review-conducted')->nullable();
            $table->string('weather')->nullable();
            $table->string('day-time')->nullable();
            $table->string('lightning')->nullable();
            $table->string('approach-select')->nullable();
            $table->longText('address')->nullable();
            $table->longText('approach')->nullable();
            $table->string('ways-schemes-select')->nullable();
            $table->longText('ways-schemes')->nullable();
            $table->string('roads-select')->nullable();
            $table->longText('roads')->nullable();
            $table->string('streets-select')->nullable();
            $table->longText('streets')->nullable();
            $table->string('streets-elems-select')->nullable();
            $table->longText('streets-elems')->nullable();
            $table->longText('cameras-devs')->nullable();
            $table->string('house-select')->nullable();
            $table->longText('house')->nullable();
            $table->string('catering')->nullable();
            $table->longText('floor-others')->nullable();
            $table->longText('floor')->nullable();
            $table->string('stairs-elevators')->nullable();
            $table->longText('elevators-stairs')->nullable();
            $table->string('doors')->nullable();
            $table->longText('door-other')->nullable();
            $table->string('doorhandle')->nullable();
            $table->longText('doorhandle-other')->nullable();
            $table->string('door-device')->nullable();
            $table->longText('traces')->nullable();
            $table->string('mortise-lock')->nullable();
            $table->string('padlock')->nullable();
            $table->longText('lock-other')->nullable();
            $table->longText('rooms-count-size-texta')->nullable();
            $table->longText('rooms-corridor-texta')->nullable();
            $table->longText('break-or-not1')->nullable();
            $table->longText('bathroom-texta')->nullable();
            $table->longText('break-or-not2')->nullable();
            $table->longText('kitchen-texta')->nullable();
            $table->longText('break-or-not7')->nullable();
            $table->longText('rooms-descr1')->nullable();
            $table->longText('break-or-not3')->nullable();
            $table->longText('rooms-descr2')->nullable();
            $table->longText('break-or-not4')->nullable();
            $table->longText('rooms-descr3')->nullable();
            $table->longText('break-or-not5')->nullable();
            $table->longText('rooms-descr4')->nullable();
            $table->longText('break-or-not6')->nullable();
            $table->text('balcony')->nullable();
            $table->longText('traces-damage')->nullable();
            $table->longText('rooms-other-texta')->nullable();
            $table->longText('object-traces')->nullable();
            $table->longText('finger-traces')->nullable();
            $table->longText('shoes-traces')->nullable();
            $table->longText('vehicle-traces')->nullable();
            $table->longText('break-traces')->nullable();
            $table->longText('blood-traces')->nullable();
            $table->longText('micro-traces')->nullable();
            $table->longText('bio-traces')->nullable();
            $table->longText('other-traces')->nullable();
            $table->longText('p-add-plan')->nullable();
            $table->longText('p-add-plan-info')->nullable();
            $table->longText('p-signed')->nullable();
            $table->longText('participant1')->nullable();
            $table->longText('participant1-sign')->nullable();
            $table->longText('participant2')->nullable();
            $table->longText('participant2-sign')->nullable();
            $table->longText('participant3')->nullable();
            $table->longText('participant3-sign')->nullable();
            $table->longText('participant4')->nullable();
            $table->longText('participant4-sign')->nullable();
            $table->longText('participant5')->nullable();
            $table->longText('participant5-sign')->nullable();
            $table->longText('participant6')->nullable();
            $table->longText('participant6-sign')->nullable();
            $table->longText('witness1')->nullable();
            $table->longText('witness1-sign')->nullable();
            $table->longText('witness2')->nullable();
            $table->longText('witness2-sign')->nullable();
            $table->longText('survey-conducted')->nullable();
            $table->string('p-add-photo1')->nullable();
            $table->string('p-add-photo2')->nullable();
            $table->string('p-add-photo3')->nullable();
            $table->string('p-add-photo4')->nullable();
            $table->string('p-add-photo5')->nullable();
            $table->string('p-add-photo6')->nullable();
            $table->string('p-add-photo7')->nullable();
            $table->string('p-add-photo8')->nullable();
            $table->longText('photo-descr1')->nullable();
            $table->longText('photo-descr2')->nullable();
            $table->longText('photo-descr3')->nullable();
            $table->longText('photo-descr4')->nullable();
            $table->longText('photo-descr5')->nullable();
            $table->longText('photo-descr6')->nullable();
            $table->longText('photo-descr7')->nullable();
            $table->longText('photo-descr8')->nullable();
            $table->longText('investigator-photo-block1')->nullable();
            $table->longText('investigator-photo-block2')->nullable();
            $table->longText('investigator-photo-block3')->nullable();
            $table->longText('investigator-photo-block4')->nullable();
            $table->longText('investigator-photo-block5')->nullable();
            $table->longText('investigator-photo-block6')->nullable();
            $table->longText('investigator-photo-block7')->nullable();
            $table->longText('investigator-photo-block8')->nullable();
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
