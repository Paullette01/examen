<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterService;
use App\Http\Controllers\ImagenController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\PostImagenController;
use App\Http\Controllers\PostDetailsController;
use App\Http\Controllers\ComentarioController;
use App\Http\Controllers\AlumnoController;
use App\Http\Controllers\AlumnaController;
use App\Http\Controllers\GrupoController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//Ruta para vista del muro de perfil de usuario autentucado
Route::get('/muro',[PostController::class,'index'])->name('post.index');

//Ruta para pagina principal
Route::get('/', function () {
    return view('principal');
});


//Ruta para pagina principal
Route::get('/principal2', function () {
    return view('principal2');
});


//Ruta para registro de usuario
Route::get('/register',[RegisterController::class,'index'])->name("register");
//Ruta para enviar datos al servidor
Route::post('/register',[RegisterController::class,'store']);

//Ruta para vista del muro de perfil de usuario autentucado
Route::get('/muro',[PostController::class,'index'])->name('post.index');

//Ruta para el login
Route::get('/login',[LoginController::class,'index'])->name('login');

//Ruta para la validacion del login
Route::post('/login',[LoginController::class, 'store']);

//Ruta para logout
Route::post('/logout',[LogoutController::class,'store'])->name('logout');

Route::get('/logout',[LogoutController::class,'store'])->name('logout');

//Rutaa para el formulario de post de publicacion
Route::get('/post/create',[PostController::class,'create'])->name('post.create');

Route::post('/post/create',[PostController::class,'store']);

Route::delete('/post/{id}', [PostController::class,'destroy'])->name('post.destroy');

//Ruta para cargar Imagen
Route::post('/imagenes',[ImagenController::class,'store'])->name('imagenes.store');

//Ruta para publicar un comentario
Route::post('/comentario',[ComentarioController::class, 'store'])->name('comentario.store');

//Ruta para ver detalles de publicaciones
Route::get('/postDetails/{id}', [PostDetailsController::class,'index'])->name("postDetails.index");

//Rutas para mostrar las vistas de grupos
Route::get('/grupos',[GrupoController::class,'index'])->name("grupos.index");

//Ruta para ver los grupos creados
Route::get('/ver-grupos',[GrupoController::class,'verGrupos'])->name("grupos.verGrupos");

//Rutas para mostrar el formulario de alumnos
Route::get('/alumnos',[AlumnoController::class,'index'])->name("alumnos.index");

//Ruta para ver los alumnos registrados
Route::get('/ver-alumnos',[AlumnoController::class,'verAlumnos'])->name("alumnos.verAlumnos");

//Ruta para eliminar alumnos
Route::delete('/alumnos/{alumno}', [AlumnoController::class, 'destroy'])->name('alumnos.destroy');

//Ruta para almacenar alumnos
Route::post('/alumnos',[AlumnoController::class,'store'])->name("alumnos.store");


//Rutas para mostrar el formulario de alumnas
Route::get('/alumnas',[AlumnaController::class,'index'])->name("alumnas.index");

//Ruta para ver los alumnas registrados
Route::get('/ver-alumnas',[AlumnaController::class,'verAlumnas'])->name("alumnas.verAlumnas");

//Ruta para eliminar alumnas
Route::delete('/alumnas/{alumna}', [AlumnaController::class, 'destroy'])->name('alumnas.destroy');

//Ruta para almacenar alumnas
Route::post('/alumnas',[AlumnaController::class,'store'])->name("alumnas.store");

//Ruta para eliminar grupos
Route::delete('/grupos/{id}',[GrupoController::class,'destroy'])->name("grupos.destroy");

//Ruta para almacenar grupos
Route::post('/grupos',[GrupoController::class,'store'])->name("grupos.store");
