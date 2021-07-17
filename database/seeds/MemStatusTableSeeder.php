<?php

use Illuminate\Database\Seeder;

class MemStatusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('mem_statuses')->insert([
        [
            'id' => '1',
            'status_name' => 'free',
         ],
        [
            'id' => '4',
            'status_name' => 'premium',
         ],
        [
            'id' => '7',
            'status_name' => 'exited',
         ],
    ]);
    }
}
