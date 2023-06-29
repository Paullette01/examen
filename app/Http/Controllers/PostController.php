<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Post;
use Illuminate\Pagination\LengthAwarePaginator;


class PostController extends Controller
{
    public function index(Request $request)
    {
        //Obtener el id del usuario actual
        $user = User::where('id',$request->user)->first();
        $posts = Post::where('user_id', $user->id)->paginate(2); // 10 es el número de elementos por página
        $postsTotales = Post::where('user_id',$user->id)->get()->count();
        return view('dashboard', ['user'=>$user,'posts' => $posts,'postsTotales'=>$postsTotales]);
    }
    
    public function create(){
        //Aplicamos un helper para revisar que el usuario esta autenciado
        //dd(auth()->user());
        return view('posts.create');
    }
    
    public function store(Request $request){
        $this->validate($request, [
            'titulo' => 'required|max:255',
            'descripcion' => 'required',
            'imagen' => 'required'
        ]);
        
         // Crear una instancia del modelo Post
        $post = new Post();

        // Asignar los valores a las propiedades del modelo
        $post->titulo = $request->titulo;
        $post->descripcion = $request->descripcion;
        $post->imagen = $request->imagen;
        $post->user_id = auth()->user()->id; // Asignar el ID del usuario actual, si corresponde

        // Guardar el modelo en la base de datos
        $post->save();
        

        return redirect()->route('post.index',['user'=>auth()->user()->id]);
    }

    public function destroy($id)
{
    // Eliminar post mediante su id
    $post = Post::find($id);
    if ($post) {
        $post->delete();
    }

    return redirect()->route('post.index',['user'=>auth()->user()->id]);
}

}