<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grupo extends Model
{
    use HasFactory;

    #Campo de grupo
    protected $fillable = ['nombre'];

    #Sirve para obtener todos los alumnos de un grupo
    #Indica que un grupo puede tener mas de un alumno
    public function alumnos()
    {
        return $this->hasMany(Alumno::class);
    }
}
