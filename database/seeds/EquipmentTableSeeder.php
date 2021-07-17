<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class EquipmentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        //
        // $equipment = factory(App\Equipment::class, 1200)->create();
        
        for($i=1; $i<501; $i++){
        
            // $gym_images = factory(App\GymImage::class, 600)->create();
            $equipment_array = array('ダンベル','バーベル','ベンチプレス','スクワットラック','スミスマシン','トレッドミル','エアロバイク');
            $min_weight_array = array(5, 10, 15, 20);
            $max_weight_array = array(50, 100, 150, 200);
            
            
            for($j=0; $j<3; $j++){
                $r = array_rand($equipment_array);
                $s = array_rand($min_weight_array);
                $t = array_rand($max_weight_array);
            
                DB::table('equipment')->insert([
                            'gym_id' => $i,
                            'equipment_name' => $equipment_array[$r],
                            'min_weight' => $min_weight_array[$s],
                            'max_weight' => $max_weight_array[$t],
                            'note' => $faker->realText(20),
                        ]);
            }
        }
    }
}
