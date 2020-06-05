<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    protected $fillable = [];
    protected $guarded = []; 

    public function locality(){
        return $this->belongsTo(Locality::class);
    }
}
