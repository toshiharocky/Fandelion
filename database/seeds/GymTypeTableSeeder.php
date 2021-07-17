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
            'gym_type' => '個室'
         ],
        [
            'gym_type' => '住宅全体'
         ],
        [
            'gym_type' => 'シェアスペース'
         ],
    ]);
        
    }
}
