<?php

use Illuminate\Database\Seeder;

class GymImageTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        for($i=5; $i<2005; $i+=10){ //heroku用
        // for($i=1; $i<201; $i++){ //cloud9用
        
            // $gym_images = factory(App\GymImage::class, 600)->create();
            $img_array = array(
                            "images/gym_images/homegym00.jpg","images/gym_images/homegym01.jpg","images/gym_images/homegym02.jpg","images/gym_images/homegym03.jpg",
                        "images/gym_images/homegym04.jpg","images/gym_images/homegym05.jpg","images/gym_images/homegym06.jpg",
                        );
            for($j=0; $j<4; $j++){
                $r = array_rand($img_array);
            
                DB::table('gym_images')->insert([
                            'gym_id' => $i,
                            'img_url' => $img_array[$r],
                        ]);
            }
        }
    }
}
