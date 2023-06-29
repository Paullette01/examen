<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Grupo;
use App\Models\Alumna;

class AlumnaController extends Controller
{
    public function index(){
        //Obtener los grupos
        $grupos = Grupo::all();
        //Mandarlos para enlistarlos
        return view('alumnas',['grupos'=>$grupos]);
    }

    public function verAlumnas(){

        //Obtener alumnas
        $alumnas = Alumna::all();

        //Mandarlos para enlistarlos
        return view('verAlumnas',['alumnas'=>$alumnas]);
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

        // Crear una nueva instancia del modelo Alumna y llenarla
        $alumna = new Alumna();
        $alumna->nombre = $request->input('nombre');
        $alumna->apellidos = $request->input('apellidos');
        $alumna->fecha_nacimiento = $request->input('fecha_nacimiento');
        $alumna->grupo_id = $request->input('grupo_id');

        // Guardar el alumna en la base de datos
        $alumna->save();

        // Redirigir a la página de éxito o hacer cualquier otra operación necesaria
        return redirect()->route('alumnas.verAlumnas');
    }

    public function destroy(Alumna $alumna)
    {
        $alumna->delete();
        return redirect()->route('alumnas.verAlumnas');
    }


}
