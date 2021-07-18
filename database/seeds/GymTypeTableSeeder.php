<?php

use Illuminate\Database\Seeder;

class GymTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('gym_types')->insert([
        [
            'id' => 1,
            'gym_type' => '個室'
         ],
        [
            'id' => 2,
            'gym_type' => '住宅全体'
         ],
        [
            'id' => 3,
            'gym_type' => 'シェアスペース'
         ],
    ]);
        
    }
}
