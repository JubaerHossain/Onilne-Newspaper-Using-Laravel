<?php

namespace App\model\admin;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $fillable=
        [
            'name','slug'
        ];

    public function posts()
    {
        return $this->belongsToMany('App\model\admin\Post')->withTimestamps();
    }
}
