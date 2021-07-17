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
        for($i=1; $i<501; $i++){
        
            // $gym_images = factory(App\GymImage::class, 600)->create();
            $img_array = array(
                            "sample_images/homegym00.jpg","sample_images/homegym01.jpg","sample_images/homegym02.jpg","sample_images/homegym03.jpg",
                            "sample_images/homegym04.jpg","sample_images/homegym05.jpg","sample_images/homegym06.jpg",
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
