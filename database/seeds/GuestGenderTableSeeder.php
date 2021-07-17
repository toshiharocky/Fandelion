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
            'guest_gender' => '特になし'
         ],
        [
            'guest_gender' => '女性限定'
         ],
        [
            'guest_gender' => '男性限定'
         ],
        [
            'guest_gender' => '女性限定(女性同伴の場合は男性も可)'
         ],
        [
            'guest_gender' => '男性限定(男性同伴の場合は女性も可)'
         ],
         
    ]);
        
    }
}
