<?php

namespace App\model\admin;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{


    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function categories()
    {
        return $this->belongsToMany('App\model\admin\Category')->withTimestamps();
    }
    public function tags()
    {
        return $this->belongsToMany('App\model\admin\Tag')->withTimestamps();
    }
}
