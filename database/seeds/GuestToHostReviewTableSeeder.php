<?php

use Illuminate\Database\Seeder;
use App\Booking;
use App\Gym;
use Faker\Generator as Faker;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

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
        // for($i=5; $i<6005; $i+=10){ //heroku用
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
        
        
        
        
        // for($k=5; $k<2005; $k+=10){ //heroku用
        for($k=1; $k<201; $k++){ // cloud9用
            $reviews = [];
            // innerjoinでbooking_id経由でtotal_starsを取得する
            $reviews[] =  DB::table('bookings')
                        ->join('gyms', 'gyms.id', '=', 'bookings.gym_id')
                        ->join('guest_to_host_reviews', 'booking_id', '=', 'bookings.id')
                        ->join('users', 'users.id', '=', 'bookings.user_id')
                        ->select('booking_id', 'total_stars', 'equipment_stars', 'cleanliness_stars', 'accuracy_stars', 'communication_stars', 'note', 'booking_from_time', 'bookings.user_id', 'users.name')
                        ->where('gyms.id',$k)
                        ->get();
            
            // gymsテーブルのreview_amount数を取得する
            $review_amount = count($reviews[0]);
            
            // dd($reviews[0]);
            // dd($review_amount);
            
            // レビュー実績を取得する
            $total_review = 0;
            
            if($review_amount > 0){
                for($j=0; $j<$review_amount; $j++){
                 $total_review += $reviews[0][$j]->total_stars;
                }
                
                $review_average  = round($total_review / $review_amount, 1);
                // dd($total_review);
                // dd($review_average);
                // dd($review_check);
            }else {
                $review_average  = 0;
            }
            
            
            
            // gymsテーブルのreview_amountとreview_averageを更新する
            // dd($gym_id);
            $gym = Gym::find($k);
            $gym->review_amount = $review_amount;
            $gym->review_average = $review_average;
            $gym -> save();
        }
    }
}
 