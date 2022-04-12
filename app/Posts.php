<?php

namespace App;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;

class Posts extends Model
{
    protected $guarded = [];

    public function getRouteKeyName()
    {
        return 'url';
    }

    public function photo()
    {
        return $this->hasMany(Photo::class, 'post_id', 'id');
    }

    public function state()
    {
        return $this->hasOne(States::class, 'id', 'state_id');
    }

    public function city()
    {
        return $this->hasOne(Citys::class, 'id', 'city_id');
    }

    public function setNameAttribute($name)
    {
        $this->attributes['name'] = $name;
        $this->attributes['url'] = Str::slug($name);
    }
}
