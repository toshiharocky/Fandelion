<?php

use Illuminate\Database\Seeder;

class CancelPolicyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('cancel_policies')->insert([
        [
            'policy_name' => '柔軟',
            'policy_desc' => 'チェックイン（確認メールに記載の日時）の1時間前までは無料でキャンセルできます。',
         ],
        [
            'policy_name' => '普通',
            'policy_desc' => 'チェックイン（確認メールに記載の日時）の24時間前までは無料でキャンセルできます。',
         ],
        [
            'policy_name' => '厳格',
            'policy_desc' => 'チェックイン（確認メールに記載の日時）の3日前までは無料でキャンセルできます。',
         ],
        [
            'policy_name' => 'かなり厳格',
            'policy_desc' => 'チェックイン（確認メールに記載の日時）の7日前までは無料でキャンセルできます。',
         ],
    ]);
    }
}
