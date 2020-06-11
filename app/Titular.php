<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Titular extends Model
{
    protected $fillable = ['id', 'idScholar','nameTitular', 'firstSurname', 'secondSurname', 'gender', 'birthDate', 'curp'];
    //protected $attributes = ['delayed' => false,]; valores predeterminados
}
