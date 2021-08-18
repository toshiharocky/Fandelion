<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;
use App\User;
use App\Gym;

$factory->define(App\Gym::class, function (Faker $faker) {
    return [
        'user_id' => function() {
            return User::all()->random();
        },
        'cancel_policy_id' => function() {
            return rand(1,4);
        },
        // 'gymstatus_id' => function(){
        //     $gymstatus_id = array(1,4,7);
        //     $r = array_rand($gymstatus_id);
        //     return $gymstatus_id[$r];
        // },
        'gymstatus_id' => 1,
        'gym_title' => function(){
            $gym_title_id = array("初心者におすすめ","充実した設備でトレーニングを！","リラックスできる空間で楽しくフィットネス！","駅から徒歩3分！","仕事帰りにフラッと立ち寄れます");
            $r = array_rand($gym_title_id);
            return $gym_title_id[$r];
        },
        'gym_desc' => $faker->realText(400),
        'gymType_id' => function() {
            return rand(1,3);
        },
        'zip_code' => $faker->postcode(7),
        'pref' => "東京都",
        'addr' => $faker->city(),
        'strt' => $faker->streetAddress(),
        'longitude' => $faker->longitude(139.65, 139.7) ,
        'latitude' => $faker->latitude(35.55, 35.65) ,
        'area' => function() {
            $gym_area = array(5, 15, 25, 35, 45);
            $r = rand(0,4);
            // return $gym_area[$r]; //heroku用
            return rand(1,5); //clooud9用
        },
        'guest_gender' => function() {
            return rand(1,5); 
        },
        'superHost_flg' => function() {
            return rand(0,1);
        },
        'guest_limit' => function() {
            return rand(1,10);
        },
        'min_price' => 50,
        'max_price' => 200,
    ];
});
