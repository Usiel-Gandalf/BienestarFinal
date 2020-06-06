<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Scholar extends Model
{
    protected $fillable = ['id', 'nameScholar', 'firstSurname', 'secondSurname', 'gender', 'birthDate', 'curp'];
}
