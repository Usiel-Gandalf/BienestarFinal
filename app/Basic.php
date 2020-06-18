<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Basic extends Model
{
    protected $fillable = ['id', 'consignment', 'locality_id', 'titular_id', 'status'];
    
    public function titulars()
    {
        return $this->belongsToMany(Titular::class);
    }


    public function localities()
    {
        return $this->belongsToMany(Locality::class);
    }
}
