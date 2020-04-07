<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravelista\Comments\Commentable;
use App\Favorite;
use Illuminate\Support\Facades\Auth;
class Article extends Model
{
    protected $fillable = ['title','story','description','category_id','imagenews',];
    use Commentable;

    public function category()
    {
        return $this->belongsTo('App\Category', 'category_id');
    }

    public function users(){
        return $this->belongsTo('App\User','user_id');
    }

    public function favorite_to_users()
    {
        return $this->belongsToMany('App\User')->withTimestamps();
    }
    public function favorited()
    {
        return (bool) Favorite::where('user_id', Auth::id())
            ->where('article_id', $this->id)
            ->first();
    }
    // public function ratingviews()
    // {
    //     return $this->hasMany(Rating::class);
    // }

    public function getstarRating()
    {
        $count= $this->ratingviews()->count();
        if(empty($count)){
            return 0;
        }
        $starCountSum=$this->ratingviews()->sum('rating');
       
        $average = $starCountSum/$count;
        
        return $average;
    }

    
  
    
}
