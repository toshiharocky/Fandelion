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
        'gymstatus_id' => function(){
            $gymstatus_id = array(1,4,7);
            $r = array_rand($gymstatus_id);
            return $gymstatus_id[$r];
        },
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
        'longitude' => $faker->longitude(139.6, 139.75) ,
        'latitude' => $faker->latitude(35.5, 35.7) ,
        'area' => function() {
            return rand(1,5);
        },
        'guest_gender' => function() {
            return rand(1,4);
        },
        'superHost_flg' => function() {
            return rand(0,1);
        },
        'guest_limit' => function() {
            return rand(1,10);
        },
    ];
});
