<?php

use Illuminate\Database\Seeder;
use App\User;//この行を上に追加
use App\Gym;
use App\GymSchedule;

class MessageTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //// for($i=5; $i<6005; $i+=10){ //heroku用
        for($i=1; $i<601; $i++){ //cloud9用
            $guest_id = User::all()->random()->id;
            $gym_id = Gym::all()->random()->id;
            $gym_infos = Gym::where('id', $gym_id)->get();
            $host_id = $gym_infos[0]->user_id;
            $sender_array = array($guest_id, $host_id);
            $r = rand(0,1);
            $sender = $sender_array[$r];
            
            DB::table('messages')->insert([
                    'guest_id' => $guest_id,
                    'gym_id' => $gym_id,
                    'host_id' => $host_id,
                    'sender' => $sender,
                    
                    'message' => "こんにちは",
                    // function() {
                    //                 $message = array("こんにちは", "こんばんば", "ありがとうございます。", "よろしくお願いします。");
                    //                 $s = array_rand($message);
                    //                 return $message[$s];
                    //             },
                    'status_flg' => rand(0,1),
                ]);
            
            
            
        }
    }
}
