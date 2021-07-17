<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;
use App\Gym;

$factory->define(App\GymImage::class, function (Faker $faker) {
    return [
            'gym_id' => function() {
                return Gym::all()->random();
            },
            'img_url' => function(){
                    $img_array = array(
                        "sample_images/homegym00.jpg","sample_images/homegym01.jpg","sample_images/homegym02.jpg","sample_images/homegym03.jpg",
                        "sample_images/homegym04.jpg","sample_images/homegym05.jpg","sample_images/homegym06.jpg",
                    );
                    $r = array_rand($img_array);
                    return $img_array[$r];
            }
    ];
});
