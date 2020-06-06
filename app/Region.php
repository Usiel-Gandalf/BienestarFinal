<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    protected $fillable = ['id', 'nameRegion', 'region'];
    
    public function municipalities()
    {
        return $this->hasMany(Locality::class);
    }
}
