<?php

use Illuminate\Database\Seeder;
use App\User;//この行を上に追加
use App\Gym;
use App\GymSchedule;
use App\Message;
use App\MessageList;

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
            $message = "こんにちは";
            
            DB::table('messages')->insert([
                    'guest_id' => $guest_id,
                    'gym_id' => $gym_id,
                    'host_id' => $host_id,
                    'sender' => $sender,
                    
                    'message' => $message,
                    
                    'status_flg' => rand(0,1),
                ]);
            
            
            $message_list = MessageList::where('guest_id', $guest_id)
                        ->where('gym_id', $gym_id)
                        ->get();
            $message_list_count = count($message_list);
            if($message_list_count==0){
                DB::table('message_lists')->insert([
                        'guest_id' => $guest_id,
                        'gym_id' => $gym_id,
                        'host_id' => $host_id,
                        'sender' => $guest_id,
                        'last_message' => $message,
                    ]);
            }else{
                $message_list_id = $message_list[0]->id;
                $message_list_update = MessageList::find($message_list_id);
                $message_list_update->last_message = $message;
                $message_list_update->save();
            }
            
        }
    }
}
