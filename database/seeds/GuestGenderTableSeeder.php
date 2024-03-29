<?php

use Illuminate\Database\Seeder;

class GuestGenderTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
     
     
     
    public function run()
    {
        \DB::table('guest_genders')->insert([
        [
            'id' => 1,
            'guest_gender' => '性別指定なし',
         ],
        [
            'id' => 2,
            'guest_gender' => '女性限定',
         ],
        [
            'id' => 3,
            'guest_gender' => '男性限定',
         ],
        [
            'id' => 4,
            'guest_gender' => '女性限定(女性同伴の場合は男性も可)',
         ],
        [
            'id' => 5,
            'guest_gender' => '男性限定(男性同伴の場合は女性も可)',
         ],
         
    ]);
        
    }
}
