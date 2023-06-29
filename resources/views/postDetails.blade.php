@extends('layouts.app')

@section('titulo')
    {{$post->titulo}}
@endsection

@section('contenido')
    <div style="height:60vh;" class="flex justify-center items-center w-full">
        {{-- Mostrando la imagen --}}
        <img style="width:40%; height:100%;" src="{{asset('uploads/' . $post->imagen)}}">



        <style>
            .scrollable-container {
                max-height: 40vh;
                overflow-y: scroll;
                scrollbar-width: thin;
                scrollbar-color: transparent transparent;
            }

            .scrollable-container::-webkit-scrollbar {
                width: 6px;
            }

            .scrollable-container::-webkit-scrollbar-thumb {
                background-color: transparent;
            }
        </style>
        
        <div style="width:40%; height:100%;" class="bg-gray-300 flex flex-col">

            {{-- Codigo para calcular los dias de la publicacion --}}
            @php
                $fechaEspecifica = new DateTime($post->fecha);
                $dia = $fechaEspecifica->format('d'); // Obtener el día en formato dd
                $mes = $fechaEspecifica->format('m'); // Obtener el mes en formato mm
                $año = $fechaEspecifica->format('Y'); // Obtener el año en formato YYYY

                $fechaFormateada = $dia . '/' . $mes . '/' . $año; // Obtener la fecha en formato dd/mm/YYYY

            @endphp

            {{-- Mostrando el usuario y descripcion --}}
            <div class="w-full flex mt-5 ml-5">
                <p class=" font-bold"> {{$post->user->name}}</p>
                <p class="ml-5">{{$fechaFormateada}} </p>
                {{-- Eliminar posts --}}
                @auth

                    @if(auth()->user()->id === $post->user->id)
                        
                        <form action="{{ route('post.destroy', ['id' => $post->id]) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="fit-content">
                                <img class="ml-5 w-8" src="{{ asset('Imagenes/delete.svg') }}" alt="Imagen de registro de usuario">
                            </button>
                        </form>
                    @endif

                @endauth

            </div>
            
            {{-- Comentarios --}}
            <p class="mt-2 ml-5">{{$post->descripcion}}</p>

            {{-- Seccion de comentarios --}}
            <div class="scrollable-container" style="max-width: 100%; max-height: 40vh; overflow-y: auto; overflow-x: auto;">
                @foreach ($comentarios as $comentario)
                <div class="w-full flex mt-5 ml-5 flex-col">
                    @php
                    
                        $fechaEspecifica = new DateTime($comentario->fecha);
                        $dia = $fechaEspecifica->format('d'); // Obtener el día en formato dd
                        $mes = $fechaEspecifica->format('m'); // Obtener el mes en formato mm
                        $año = $fechaEspecifica->format('Y'); // Obtener el año en formato YYYY

                        $fechaFormateada = $dia . '/' . $mes . '/' . $año; // Obtener la fecha en formato dd/mm/YYYY

                    @endphp
                    <p class="font-bold">{{$comentario->user->name}} {{$fechaFormateada}}</p>
                    <p>{{$comentario->comentario}}</p>
                </div>
                @endforeach
            </div>

            
            {{-- Verificar que si este autenticado --}}
            @auth
                {{-- Formulario para agregar comentario --}}
                <form method="POST" action ="{{route('comentario.store')}}"class="w-full flex items-center justify-center flex-col">
                    @csrf
                    {{-- Mandar el comentario --}}
                    <textarea style="width: 90%;" type="text" name="comentario" placeholder="Escribe un comentario..." required> </textarea>
                    {{-- Mandar el id del post --}}
                    <input type="hidden" name="post_id" value="{{$post->id}}">
                    <input class="cursor-pointer mt-3 rounded-xl bg-gray-800 text-white font-bold p-3" type="submit" value="Enviar comentario">
                    
                </form>
            @endauth
        </div>
    </div>

@endsection