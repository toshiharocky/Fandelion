<?php

use Illuminate\Database\Seeder;

class GymAreaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('gym_areas')->insert([
        [
            'gym_area' => '〜10㎡'
         ],
        [
            'gym_area' => '10〜20㎡'
         ],
        [
            'gym_area' => '30〜40㎡'
         ],
        [
            'gym_area' => '40〜50㎡'
         ],
        [
            'gym_area' => '50㎡以上'
         ],
    ]);
        
    }
}
