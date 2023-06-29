<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Grupo;
use App\Models\Alumno;

class AlumnoController extends Controller
{
    public function index(){
        //Obtener los grupos
        $grupos = Grupo::all();
        //Mandarlos para enlistarlos
        return view('alumnos',['grupos'=>$grupos]);
    }

    public function verAlumnos(){

        //Obtener alumnos
        $alumnos = Alumno::all();

        //Mandarlos para enlistarlos
        return view('verAlumnos',['alumnos'=>$alumnos]);
    }


    public function store(Request $request)
    {
        // Validar los datos del formulario
        $request->validate([
            'nombre' => 'required|string|max:255',
            'apellidos' => 'required|string|max:255',
            'fecha_nacimiento' => 'required|date',
            'grupo_id' => 'required|exists:grupos,id',
        ]);

        // Crear una nueva instancia del modelo Alumno y llenarla
        $alumno = new Alumno();
        $alumno->nombre = $request->input('nombre');
        $alumno->apellidos = $request->input('apellidos');
        $alumno->fecha_nacimiento = $request->input('fecha_nacimiento');
        $alumno->grupo_id = $request->input('grupo_id');

        // Guardar el alumno en la base de datos
        $alumno->save();

        // Redirigir a la página de éxito o hacer cualquier otra operación necesaria
        return redirect()->route('alumnos.verAlumnos');
    }

    public function destroy(Alumno $alumno)
    {
        $alumno->delete();
        return redirect()->route('alumnos.verAlumnos');
    }


}
