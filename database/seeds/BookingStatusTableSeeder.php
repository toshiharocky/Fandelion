<?php

use Illuminate\Database\Seeder;

class BookingStatusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('booking_statuses')->insert([
        [
            'id' => '1',
            'status_name' => 'book_applied', //予約申込済み（ホストの返事待ち）
         ],
        [
            'id' => '5',
            'status_name' => 'book_confirmed', //予約確定
         ],
        [
            'id' => '10',
            'status_name' => 'book_canceled', //予約キャンセル
         ],
        [
            'id' => '20',
            'status_name' => 'check_in', //チェックイン済
         ],
        [
            'id' => '25',
            'status_name' => 'check_out', //チェックアウト済
         ],
        [
            'id' => '30',
            'status_name' => 'reviewing', //レビュー中
         ],
        [
            'id' => '35',
            'status_name' => 'reviewed', //相互
         ],
     ]);
    }
}
