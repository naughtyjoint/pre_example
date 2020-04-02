<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sign extends Model
{
    //
    public function dailyRecords () {
        return $this->hasMany('App\DailyRecord');
    }
}
