<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;
use App\Gym;
use App\Equipment;

$factory->define(App\Equipment::class, function (Faker $faker) {
    return [
        //
        'gym_id' => function() {
                return Gym::all()->random();
            },
        'equipment_name' => function() {
                $equipment_array = array('ダンベル','バーベル','ベンチプレス','スクワットラック','スミスマシン','トレッドミル','エアロバイク');
                $r = array_rand($equipment_array);
                return $equipment_array[$r];
            },
        'min_weight' => function() {
                $min_weight_array = array(5, 10, 15, 20);
                $r = array_rand($min_weight_array);
                return $min_weight_array[$r];
            },
        'max_weight' => function() {
                $max_weight_array = array(50, 100, 150, 200);
                $r = array_rand($max_weight_array);
                return $max_weight_array[$r];
            },
        'note' => $faker->realText(20),
    ];
});
