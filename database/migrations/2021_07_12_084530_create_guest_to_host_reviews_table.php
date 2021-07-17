<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGuestToHostReviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('guest_to_host_reviews', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->Integer('booking_id');
            $table->Integer('total_stars');
            $table->Integer('equipment_stars');
            $table->Integer('cleanliness_stars');
            $table->Integer('accuracy_stars');
            $table->Integer('communication_stars');
            $table->Text('note');
            $table->Integer('helpful_review')->nullable();
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
        Schema::dropIfExists('guest_to_host_reviews');
    }
}
