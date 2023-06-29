@extends("layouts.app")
@section('titulo')
    Crea una nueva publicacion
@endsection

@push('styles')
    <link href="https://unpkg.com/dropzone@6.0.0-beta.1/dist/dropzone.css" rel="stylesheet" type="text/css" />
@endpush

@section('contenido')
    <div class="md:flex md:item-center">
        <div class="md:w-1/2 px-10">
            <!-- Insertar contenedro de Dopzone -->

            <form action="{{route('imagenes.store')}}" method="POST" enctype="multipart/form-data" id="dropzone" class="dropzone border-dashed border-2 w-full h-96 rounded flex flex-col justify-center items-center">
                @csrf
            </form>
            
        </div>
        <div class="md:w-1/2 p-10 bg-white rounded-lg shadow-xl mt-10 mt:mt-0">
            <form action="{{route('post.create')}}" method="POST">
                @csrf
                <div class="mb-5">
                    <label for="titulo" class="mb-2 block uppercase text-gray-500 font-bold">
                        Titulo
                    </label>
                    <input
                    id="titulo"
                    name="titulo"
                    type="text"
                    placeholder="Titulo de la publicacion"
                    class="border p-3 w-full rounded-lg
                        @error('titulo')
                            border-red-500
                        @enderror"
                        value="{{old('titulo')}}"
                    >
                    @error('titulo')
                        <p class="bg-red-500 text-white my-2 rounded-lgg text-center">{{$message}}</p>
                    @enderror
                    <label for="titulo" class="mb-2 block uppercase text-gray-500 font-bold">
                        Descripcion
                    </label>
                    <textarea
                    id="titulo"
                    name="descripcion"
                    type="text"
                    placeholder="Descripcion de la publicacion"
                    class="border p-3 w-full rounded-lg
                        @error('titulo')
                            border-red-500
                        @enderror"
                        value="{{old('titulo')}}"
                    ></textarea>
                    @error('descripcion')
                        <p class="bg-red-500 text-white my-2 rounded-lgg text-center">{{$message}}</p>
                    @enderror

                    <input type="hidden" name="imagen" id="imagen" value="">
                </div>
                <input
                    type="submit"
                    value="Publicar"
                    class="bg-sky-600 hover:bg-sky-700 transistion-colors cursor-pointer uppercase font-bold w-full p-3 text-white rounded-lg"/>
            </form>
        </div>
    </div>
@endsection