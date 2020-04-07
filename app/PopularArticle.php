<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PopularArticle extends Model
{
    protected $table = "popular_articles";
    protected $primaryKey = "id";
    public $timestamps = false;

    public function article(){
        return $this->belongsTo('App\article','article_id');
    }
}
