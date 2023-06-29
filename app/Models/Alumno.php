<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alumno extends Model
{
    use HasFactory;

    //Todos los campos de Alumno
    protected $fillable = ['nombre', 'apellidos', 'fecha_nacimiento', 'grupo_id'];

    //Me ayuda a obtener el nombre del grupo, ya que puedo obtener el
    //nombre del grupo en base al alumno $alumno->grupo->nombre
    public function grupo()
    {
        return $this->belongsTo(Grupo::class);
    }

}
