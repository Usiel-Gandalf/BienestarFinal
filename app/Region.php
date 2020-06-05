<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    public function municipalities()
    {
        return $this->hasMany(Locality::class);
    }
}
