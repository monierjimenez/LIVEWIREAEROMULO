<?php

namespace App;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;

class Municipios extends Model
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

    public function estado()
    {
        return $this->hasMany(Estados::class, 'id', 'estado_id');
    }

    public function setNameAttribute($name)
    {
        $this->attributes['name'] = $name;
        $this->attributes['url'] = Str::slug($name);
    }
}
