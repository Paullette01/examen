<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Grupo;

class GrupoController extends Controller
{
    public function index(){
        //Funcion para ir al formulario de registro de grupos
        return view('grupos');
    }

    public function store(Request $request){
        // Validar los datos del formulario
        $request->validate([
            'nombre' => 'required|string|max:255',
        ]);

        // Obtener los datos del formulario
        $nombreGrupo = $request->input('nombre');

        // Crear una nueva instancia del modelo Grupo
        $grupo = new Grupo();
        $grupo->nombre = $nombreGrupo;

        // Guardar el grupo en la base de datos
        $grupo->save();
        return redirect()->route('grupos.verGrupos');
    }

    public function verGrupos(){
        //Funcion para ver los grupos creados

        //Obtener todos los grupos
        $grupos = Grupo::all();

        //Mandar todos los grupos para mostrarlos en la pagina
        return view('verGrupos',['grupos'=>$grupos]);
    }

    public function destroy($id){
        // Buscar el grupo por su ID
        $grupo = Grupo::find($id);

        // Eliminar el grupo de la base de datos
        $grupo->delete();

        // Redirigir a la página de éxito o hacer cualquier otra operación necesaria
        return redirect()->route('grupos.verGrupos');
    }

}
