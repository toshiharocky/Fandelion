<?php

use Illuminate\Database\Seeder;

class GymStatusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('gym_statuses')->insert([
        [
            'id' => '1',
            'status_name' => 'active',
         ],
        [
            'id' => '4',
            'status_name' => 'inactive',
         ],
        [
            'id' => '7',
            'status_name' => 'exited',
         ],
    ]);
        
    }
}

