<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Locality extends Model
{
    protected $fillable = ['id', 'keyLocality', 'nameLocality', 'municipality_id'];

    public function municipality()
    {
        return $this->belongsTo(Municipality::class);
    }

    public function schools(){
        return $this->hasMany(Locality::class);
    }

}
