<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    public function users(){
        return $this->belongsTo('App\User','user_id');
    }
}
