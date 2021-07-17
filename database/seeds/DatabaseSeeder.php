<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserTableSeeder::class);
        $this->call(GymStatusTableSeeder::class);
        $this->call(MemStatusTableSeeder::class);
        $this->call(GymTypeTableSeeder::class);
        $this->call(GymAreaTableSeeder::class);
        $this->call(GuestGenderTableSeeder::class);
        $this->call(CancelPolicyTableSeeder::class);
        $this->call(BookingStatusTableSeeder::class);
        $this->call(GymTableSeeder::class);
        $this->call(GymImageTableSeeder::class);
        $this->call(EquipmentTableSeeder::class);
        $this->call(GymScheduleTableSeeder::class);
        $this->call(BookingTableSeeder::class);
        $this->call(GuestToHostReviewTableSeeder::class);
    }
}
