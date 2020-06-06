<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Municipality extends Model
{
    protected $fillable = ['id', 'nameMunicipality', 'region_id'];

    public function region()
    {
       return $this->belongsTo(Region::class);
    }

    public function localities(){
        return $this->hasMany(Locality::class);
    }
}
