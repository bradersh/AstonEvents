<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('event_name')->unique();
            $table->date('start_date');
            $table->date('end_date');
            $table->string('event_description');
            $table->string('event_type');
            $table->integer('event_organiser')->unsigned();
            $table->string('event_location');
            $table->string('event_avatar')->default('defaultEvent.jpg');
            $table->foreign('event_organiser')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('events');
    }
}
