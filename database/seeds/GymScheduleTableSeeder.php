<?php

use Illuminate\Database\Seeder;
use App\Gym;
use App\GymSchedule;

class GymScheduleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        // 今日の日付を取得
        
        
        
        // for ($i=1; $i<100; $i++){
        //     GymSchedule::create([
        //         'gym_id' => 1,
        //         'from_time' => $from_time,
        //         'to_time' => $to_time,
        //         'price' => function(){
        //                 $price_array = array(50,100,150,200);
        //                 $r = array_rand($price_array);
        //                 return $price_array[$r];
        //             },
        //         'status' => 1,
        //         ]);
        // }
        
        for ($i=1; $i<501; $i++){
            $from_time = "2021-07-16 00:00";
            $to_time = "2021-07-16 00:15";
            // 今日に日付から30日間、from_time00:00からto_time00:15まで、15分ずつのpriceとstatusを作成
            while (strtotime($from_time) < strtotime("2021-08-01 00:00")){
                $price_array = array(50,100,150,200);
                $r = array_rand($price_array);
                $price = $price_array[$r];
                DB::table('gym_schedules')->insert([
                        'gym_id' => $i,
                        'from_time' => date("Y-m-d H:i", strtotime($from_time)),
                        'to_time' => date("Y-m-d H:i", strtotime($to_time)),
                        'price' => $price,
                        'status' => "1",
                    ]);
                $from_time  = date("Y-m-d H:i", strtotime('+15 minute',strtotime($from_time)));
                $to_time  = date("Y-m-d H:i", strtotime('+15 minute',strtotime($to_time)));
            }
        }
        
        
    }
}
