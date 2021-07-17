<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGymSchedulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gym_schedules', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('gym_id');
            $table->integer('day') ->nullable(); //1(月曜) から 7(日曜)
            $table->integer('booking_id') ->nullable();
            $table->datetime('from_time');
            $table->datetime('to_time');
            $table->integer('price') ->nullable();
            $table->string('status'); //0:使用不可, 1:予約可能, 2:予約済
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
        Schema::dropIfExists('gym_schedules');
    }
}
