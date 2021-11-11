<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(User::class, function (Faker $faker) {
    return [
        'memstatus_id' => 1,
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => Hash::make('99999999'),
        'phone_num' => $faker->phoneNumber(),
        'birthday' => $faker->date(),
        'gender' => function() {
            return rand(1,3);
        },
        'remember_token' => Str::random(10),
        'user_icon' => function(){
            $icons = array ('images/user_images/user_icon.jpg', 'images/user_images/woman_1.jpg', 'images/user_images/woman_2.jpg', 'images/user_images/woman_3.jpg', 'images/user_images/woman_4.jpg', 'images/user_images/woman_5.jpg', 'images/user_images/woman_6.jpg', 'images/user_images/woman_7.jpg', 'images/user_images/woman_8.jpg', 'images/user_images/woman_9.jpg', 'images/user_images/man_1.jpg', 'images/user_images/man_2.jpg', 'images/user_images/man_3.jpg');
            $r = array_rand($icons);
            return $icons[$r];
        }
    ];
});
