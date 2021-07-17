<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $users = factory(App\User::class, 1000)->create();
        
        // \DB::table('users')->insert([
        // [
        //     'name' => 'テスト1',
        //     'email' => 'test1@test.jp',
        //     'password' => Hash::make('99999999'),
        //     'phone_num' => '09011111111',
        //     'birthday' => '1999-10-10',
        //     'gender' => '1',
        //  ],
        // [
        //     'name' => 'テスト2',
        //     'email' => 'test2@test.jp',
        //     'password' => Hash::make('99999999'),
        //     'phone_num' => '09011111112',
        //     'birthday' => '1999-10-12',
        //     'gender' => '1',
        //  ],
        // [
        //     'name' => 'テスト3',
        //     'email' => 'test3@test.jp',
        //     'password' => Hash::make('99999999'),
        //     'phone_num' => '09011111113',
        //     'birthday' => '1999-10-13',
        //     'gender' => '2',
        //  ],
        // [
        //     'name' => 'テスト4',
        //     'email' => 'test4@test.jp',
        //     'password' => Hash::make('99999999'),
        //     'phone_num' => '09011111114',
        //     'birthday' => '1999-10-14',
        //     'gender' => '2',
        //  ],
        // [
        //     'name' => 'テスト5',
        //     'email' => 'test5@test.jp',
        //     'password' => Hash::make('99999999'),
        //     'phone_num' => '09011111115',
        //     'birthday' => '1999-10-15',
        //     'gender' => '3',
        //  ],
         
        //  ]);
    }
}
