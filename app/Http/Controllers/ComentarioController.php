<?php

namespace App\Http\Controllers;
use App\Models\Post;
use App\Models\Comentario;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ComentarioController extends Controller
{

    
    public function store(Request $request)
    {
        // Validar los datos del formulario si es necesario
    
        // Obtener el ID de usuario de la sesión actual
        $userId = auth()->id();
    
        // Obtener la fecha actual utilizando Carbon
        $fechaActual = Carbon::now();
    
        // Crear un nuevo objeto Comentario con los datos proporcionados
        $comentario = new Comentario();
        $comentario->comentario = $request->comentario;
        $comentario->post_id = $request->post_id;
        $comentario->user_id = $userId;
        $comentario->fecha = $fechaActual;
        $comentario->save();
    
        // Redireccionar a la ruta postDetails.index con el parámetro post_id
        return redirect()->route('postDetails.index', ['id' => $request->post_id]);
    }
    
}
