<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_id');
            $table->integer('gym_id');
            $table->string('bookingstatus_id');
            $table->datetime('booking_from_time');
            $table->datetime('booking_to_time');
            $table->integer('number_of_users');
            $table->integer('number_of_men');
            $table->integer('number_of_women');
            $table->integer('number_of_others');
            $table->integer('total_price');
            $table->integer('gym_price');
            $table->integer('service_price');
            $table->integer('tax');
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
        Schema::dropIfExists('bookings');
    }
}
