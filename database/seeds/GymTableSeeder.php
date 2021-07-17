<?php

use Illuminate\Database\Seeder;

class GymTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $gyms = factory(App\Gym::class, 100)->create();
    //     \DB::table('gyms')->insert([
    //     [
    //         'user_id' => '1',
    //         'cancel_policy_id' => '3',
    //         'gymstatus_id' => '1',
    //         'gym_title' => '初心者から本格的なトレーニングまで！！20〜200kgまでのバーベル完備！',
    //         'gym_desc' => '初心者から本格的なトレーニングまで！！20〜200kgまでのバーベル完備！初心者から本格的なトレーニングまで！！20〜200kgまでのバーベル完備！初心者から本格的なトレーニングまで！！20〜200kgまでのバーベル完備！初心者から本格的なトレーニングまで！！20〜200kgまでのバーベル完備！初心者から本格的なトレーニングまで！！20〜200kgまでのバーベル完備！初心者から本格的なトレーニングまで！！20〜200kgまでのバーベル完備！初心者から本格的なトレーニングまで！！20〜200kgまでのバーベル完備！初心者から本格的なトレーニングまで！！20〜200kgまでのバーベル完備！初心者から本格的なトレーニングまで！！20〜200kgまでのバーベル完備！初心者から本格的なトレーニングまで！！20〜200kgまでのバーベル完備！初心者から本格的なトレーニングまで！！20〜200kgまでのバーベル完備！',
    //         'gymType_id' => '1',
    //         'zip_code' => '2240013',
    //         'pref' => '神奈川県',
    //         'addr' => '横浜市都筑区',
    //         'strt' => 'すみれが丘37-8',
    //         'longitude' => '139.581279691402',
    //         'latitude' => '35.5660768009262',
    //         'area' => '3',
    //         'guest_gender' => '4',
    //         'superHost_flg' => '0',
    //         'review_amount' => '0',
    //         'review_average' => '0',
    //         'guest_limit' => '2',
    //      ],
         
    //     [
    //         'user_id' => '2',
    //         'cancel_policy_id' => '2',
    //         'gymstatus_id' => '1',
    //         'gym_title' => '塩竈市トップクラスの充実した設備！住宅まるごとフィットネス空間にしてみました！',
    //         'gym_desc' => '塩竈市トップクラスの充実した設備！住宅まるごとフィットネス空間にしてみました！塩竈市トップクラスの充実した設備！住宅まるごとフィットネス空間にしてみました！塩竈市トップクラスの充実した設備！住宅まるごとフィットネス空間にしてみました！塩竈市トップクラスの充実した設備！住宅まるごとフィットネス空間にしてみました！塩竈市トップクラスの充実した設備！住宅まるごとフィットネス空間にしてみました！塩竈市トップクラスの充実した設備！住宅まるごとフィットネス空間にしてみました！塩竈市トップクラスの充実した設備！住宅まるごとフィットネス空間にしてみました！塩竈市トップクラスの充実した設備！住宅まるごとフィットネス空間にしてみました！塩竈市トップクラスの充実した設備！住宅まるごとフィットネス空間にしてみました！塩竈市トップクラスの充実した設備！住宅まるごとフィットネス空間にしてみました！塩竈市トップクラスの充実した設備！住宅まるごとフィットネス空間にしてみました！塩竈市トップクラスの充実した設備！住宅まるごとフィットネス空間にしてみました！塩竈市トップクラスの充実した設備！住宅まるごとフィットネス空間にしてみました！塩竈市トップクラスの充実した設備！住宅まるごとフィットネス空間にしてみました！',
    //         'gymType_id' => '2',
    //         'zip_code' => '985-0077',
    //         'pref' => '宮城県',
    //         'addr' => '塩竈市',
    //         'strt' => '梅の宮',
    //         'longitude' => '141.0184625',
    //         'latitude' => '38.3267759',
    //         'area' => '5',
    //         'guest_gender' => '1',
    //         'superHost_flg' => '0',
    //         'review_amount' => '0',
    //         'review_average' => '0',
    //         'guest_limit' => '5',
            
    //      ],
    //     [
    //         'user_id' => '',
    //         'cancel_policy_id' => '',
    //         'gymstatus_id' => '',
    //         'gym_title' => '',
    //         'gym_desc' => '',
    //         'gymType_id' => '',
    //         'zip_code' => '',
    //         'pref' => '',
    //         'addr' => '',
    //         'strt' => '',
    //         'longitude' => '',
    //         'latitude' => '',
    //         'area' => '',
    //         'guest_gender' => '',
    //         'superHost_flg' => '',
    //         'review_amount' => '',
    //         'review_average' => '',
    //         'guest_limit' => '',
            
    //      ],
    //     [
    //         'user_id' => '',
    //         'cancel_policy_id' => '',
    //         'gymstatus_id' => '',
    //         'gym_title' => '',
    //         'gym_desc' => '',
    //         'gymType_id' => '',
    //         'zip_code' => '',
    //         'pref' => '',
    //         'addr' => '',
    //         'strt' => '',
    //         'longitude' => '',
    //         'latitude' => '',
    //         'area' => '',
    //         'guest_gender' => '',
    //         'superHost_flg' => '',
    //         'review_amount' => '',
    //         'review_average' => '',
    //         'guest_limit' => '',
            
    //      ],
    //     [
    //         'user_id' => '',
    //         'cancel_policy_id' => '',
    //         'gymstatus_id' => '',
    //         'gym_title' => '',
    //         'gym_desc' => '',
    //         'gymType_id' => '',
    //         'zip_code' => '',
    //         'pref' => '',
    //         'addr' => '',
    //         'strt' => '',
    //         'longitude' => '',
    //         'latitude' => '',
    //         'area' => '',
    //         'guest_gender' => '',
    //         'superHost_flg' => '',
    //         'review_amount' => '',
    //         'review_average' => '',
    //         'guest_limit' => '',
            
    //      ],
    // ]);
        
    }
}
