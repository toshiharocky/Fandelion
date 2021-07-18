<?php

use Illuminate\Database\Seeder;
use App\Booking;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

class GuestToHostReviewTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        // for($i=5; $i<3005; $i+=10){ //heroku用
        for($i=1; $i<601; $i++){ //cloud9用
            $booking_id = $i;
            $equipment_stars = rand(3,5);
            $cleanliness_stars = rand(3,5);
            $accuracy_stars = rand(3,5);
            $communication_stars = rand(3,5);
            $total_stars = round(($equipment_stars + $cleanliness_stars + $accuracy_stars + $communication_stars)/4);
            
            DB::table('guest_to_host_reviews')->insert([
                    'booking_id' => $booking_id,
                    'equipment_stars' => $equipment_stars,
                    'cleanliness_stars' => $cleanliness_stars,
                    'accuracy_stars' => $accuracy_stars,
                    'communication_stars' => $communication_stars,
                    'total_stars' => $total_stars,
                    'note' => Str::random(200)
                ]);
            
            // bookingsテーブルのなかで、idが$iになっているレコードを取得し、そのbookingstatus_idを30にする。
            $bookings = Booking::find($booking_id);
            $bookings->bookingstatus_id = '30';
            $bookings->save();
        }
    }
}
 