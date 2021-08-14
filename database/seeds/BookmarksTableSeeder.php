<?php

use Illuminate\Database\Seeder;
use App\User;//この行を上に追加
use App\Gym;

class BookmarksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        for ($i=1; $i<1501; $i++){
            
            // user_idはUser::all()ランダム
            $user = User::all()->random()->id;
            
            
            // gym_idはGym::all()ランダム
            $gym_id = Gym::all()->random()->id;
        }
        
        DB::table('bookmarks')->insert([
                'user_id' => $user,
                'gym_id' => $gym_id,
            ]);
    }
}
