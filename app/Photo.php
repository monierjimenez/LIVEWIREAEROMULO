<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    protected $guarded = [] ;

    protected static function boot()
    {
        parent::boot();
        static::deleting(function($photo){
            unlink(public_path().'/images/'.$photo->url);
        });
    }
}
