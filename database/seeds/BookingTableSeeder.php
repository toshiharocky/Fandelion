<?php
use Illuminate\Database\Seeder;
use App\User;//この行を上に追加
use App\Gym;
use App\GymSchedule;


class BookingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        
        for ($i=1; $i<3001; $i++){
            
            // user_idはUser::all()ランダム
            $user = User::all()->random()->id;
            
            
            // gym_id=$i
            $gym_id = rand(1,500);
            $gym_infos = Gym::where('id', $gym_id)->get();
            
            
            
            // gym_schedulesから、gym_id=$gym_idのものを引っ張る
            $gym_schedule = GymSchedule::where('gym_id', $gym_id)->get();
            
            $status_check_from = 2;
            $status_check_to = 2;
            while($status_check_from != 1 || $status_check_to != 1){
                // 96スロットのうち、1~80のどれか1つを選択する（翌日分に行くのを防ぐため）⇨$r
                $r = rand(37,1000);
                $q = $r + 1;
                $status_check_from = $gym_schedule[$r]->status;
                $status_check_to = $gym_schedule[$q]->status;
                
                // gym_schedulesテーブルの$from_idから$to_idまでのすべてのstatusが1でない場合はやり直し(while文を使う)
                
            
            }
            
            
            // 配列[$r]番目のgym_schedules.idを取得する⇨$from_id
                $from_id = $gym_schedule[$r]->id;
            // $from_idのgym_schedules.idに1を加算する⇨$to_id
                $to_id = $gym_schedule[$q]->id;
            
            
            
            // $from_idのfrom_timeをgym_schedulesテーブルから取得する
            $from_time_table = GymSchedule::where('id', $from_id)->get();
                    
            $from_time = $from_time_table[0]->from_time;
            
            // $to_idのto_timeをgym_schedulesテーブルから取得する
            $to_time_table = GymSchedule::where('id', $to_id)->get();
            
            $to_time = $to_time_table[0]->to_time;
            
            
            // gym_idからguest_limitをひっぱる→$guest_limit
            $guest_limit = $gym_infos[0]->guest_limit;
            
            
            // gym_idからguest_genderをひっぱる
            $guest_gender = $gym_infos[0]->guest_gender;
            $number_of_men = 0;
            $number_of_women = 0;
            $number_of_others = 0;
            $number_of_users = 0;
            
            
            
            if($guest_gender == 2 || $guest_gender == 4){
                // guest_genderが2,4の場合は女性のみ、$gues_limitを上限としてランダムで人数をだす。
                // number_of_menとnumber_of_othersはゼロ。number_of_usersはnumber_of_womenと同数
                $number_of_women = rand(1,$guest_limit);
                $number_of_users = $number_of_women;
            }else if($guest_gender == 3 || $guest_gender == 5){
                // guest_genderが3,5の場合は男性のみ、$gues_limitを上限としてランダムで人数をだす。
                // number_of_womenとnumber_of_othersはゼロ。number_of_usersはnumber_of_menと同数
                $number_of_men = rand(1,$guest_limit);
                $number_of_users = $number_of_men;
            }else{
                // guest_genderが1の場合は男性、女性、その他で出す。
                // number_of_menとnumber_of_womenとnumber_of_othersは0か1でランダム。number_of_usersは3つの合計。
                // $gues_limitを超える場合はやり直し。(while文)
                while($number_of_users == 0 || $number_of_users > $guest_limit){
                    $number_of_men = rand(0,3);
                    $number_of_women = rand(0,3);
                    $number_of_others = rand(0,3);
                    $number_of_users = $number_of_men + $number_of_women + $number_of_others;
                }
            }
            
            
            // gym_schedules tableのidが$from_idから$to_idのもののpriceを引っ張り、合計してgym_priceを出す⇨$gym_price
            $from_time_price = $from_time_table[0]->price;
            $to_time_price = $to_time_table[0]->price;
            $gym_price = $from_time_price + $to_time_price;
            
            
            // $gym_priceに0.1をかけて$service_priceを出す
            $service_price = $gym_price *0.1;
            
            // gym_price + service_priceにo.1をかけて$taxを出す
            $tax = ($gym_price + $service_price) * 0.1;
            
            // gym_price + service_price+$taxで$total_priceを出す
            $total_price = $gym_price + $service_price + $tax;
            
            // bookingstatus_idを5に設定
            $bookingstatus_id = 5;
            
            
            DB::table('bookings')->insert([
                        'user_id' => $user,
                        'gym_id' => $gym_id,
                        'bookingstatus_id' => $bookingstatus_id,
                        'booking_from_time' => date("Y-m-d H:i", strtotime($from_time)),
                        'booking_to_time' => date("Y-m-d H:i", strtotime($to_time)),
                        'number_of_users' => $number_of_users,
                        'number_of_men' => $number_of_men,
                        'number_of_women' => $number_of_women,
                        'number_of_others' => $number_of_others,
                        'total_price' => $total_price,
                        'gym_price' => $gym_price,
                        'service_price' => $service_price,
                        'tax' => $tax,
                    ]);
            
            
            
                    
            $from_schedule_status = GymSchedule::find($from_id);
            $from_schedule_status->status = '2';
            $from_schedule_status->save();
            
            $to_schedule_status = GymSchedule::find($to_id);
            $to_schedule_status->status = '2';
            $to_schedule_status->save();
            
            
        }
    }
}
