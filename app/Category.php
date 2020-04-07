<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'name' ];

    protected $table = "categories";
    public $timestamps = false;

    
    public function article()
    {
        return $this->hasMany('App\article');
    }

}



