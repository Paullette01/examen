<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alumna extends Model
{
    use HasFactory;

    //Todos los campos de Alumna
    protected $fillable = ['nombre', 'apellidos', 'fecha_nacimiento', 'grupo_id'];

    //Me ayuda a obtener el nombre del grupo, ya que puedo obtener el
    //nombre del grupo en base al alumna $alumna->grupo->nombre
    public function grupo()
    {
        return $this->belongsTo(Grupo::class);
    }

}
