<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estudiante extends Model
{
    protected $fillable = [
        'grupo', 'nombre', 'apellidos', 'edad', 'email', 'telefono'
    ];
}

