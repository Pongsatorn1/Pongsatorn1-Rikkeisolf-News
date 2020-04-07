<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravelista\Comments\Commenter;

class User extends Authenticatable
{
    use Notifiable, Commenter;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','phone','avatar','gender','type'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    const SUPERADMIN_TYPE = 2;
    const ADMIN_TYPE = 1;
const DEFAULT_TYPE = 0;

public function isUser(){
    return $this->type === self::DEFAULT_TYPE;
}

public function isAdmin(){
    return $this->type === self::ADMIN_TYPE;
}

public function isSuperAdmin(){
    return $this->type === self::SUPERADMIN_TYPE;
}

public function favorite_article(){
    return $this->belongToMany('App\article')->withTimestamps();
}
public function favorites()
{
    return $this->belongsToMany(Article::class, 'favorites', 'user_id', 'article_id')->withTimeStamps();
}
public function ratingview()
{
    return $this->hasOne(Rating::class);
}

public function author()
{
    return $this->hasOne(Article::class);
}

public function creator()
{
    return $this->hasOne(Video::class);
}
public function article()
{
    return $this->hasMany('App\article')->withTimestamps();
}
}
