<?php

namespace App;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;

class Citys extends Model
{
    protected $guarded = [];

    public function getRouteKeyName()
    {
        return 'url';
    }

//    public function municipio()
//    {
//        return $this->hasMany(Municipios::class, 'estado_id');
//    }

    public function state()
    {
        return $this->hasMany(States::class, 'id', 'state_id');
    }

    public function setNameAttribute($name)
    {
        $this->attributes['name'] = $name;
        $this->attributes['url'] = Str::slug($name);
    }
}
