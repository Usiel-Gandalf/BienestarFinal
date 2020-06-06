<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    protected $fillable = ['id', 'idSchool', 'nameSchool', 'locality_id'];
    
    public function locality(){
        return $this->belongsTo(Locality::class);
    }
}
