<?php

namespace App\Http\Controllers;
use App\Models\Post;
use App\Models\Comentario;

use Illuminate\Http\Request;

class PostDetailsController extends Controller
{
    public function index($id){
        //Encontrar la publicacion recibida mediante el id recibido
        $post = Post::find($id);
        //Obtener todos los comentarios
        $comentarios = Comentario::where('post_id',$id)->get();
        
        return view('postDetails', ['post' => $post,'comentarios'=>$comentarios]);
    }
}
