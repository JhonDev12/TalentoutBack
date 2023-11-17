<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Registro extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre', 
        'apellido',
        'fecha_nacimiento',
        'tipo_usuario',
        'email',
        'sexo', 
        'telefono',
        'password'
    ];
}
