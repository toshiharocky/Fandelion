<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHostToGuestReviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('host_to_guest_reviews', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->Integer('booking_id');
            $table->Integer('total_stars');
            $table->Text('note');
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
        Schema::dropIfExists('host_to_guest_reviews');
    }
}
