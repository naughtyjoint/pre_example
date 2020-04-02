<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DailyRecord extends Model
{
    //
    protected $fillable = ['sign_id', 'content', 'date'];

    public function sign () {
        return $this->belongsTo('App\Sign');
    }
}
