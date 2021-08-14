<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bookmark extends Model
{
    //
    // 配列内の要素を書き込み可能にする
    protected $fillable = ['user_id','gym_id'];
}
