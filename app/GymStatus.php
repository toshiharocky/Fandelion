<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GymStatus extends Model
{
    // Gymテーブルとのリレーション （主テーブル側）
     public function mem_statuses() {
        return $this->hasMany('App\Gym');
    }
}
