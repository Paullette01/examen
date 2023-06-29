@extends("layouts.app2")
@section('titulo')
    Crea un nuevo grupo
@endsection

@push('styles')
    <link href="https://unpkg.com/dropzone@6.0.0-beta.1/dist/dropzone.css" rel="stylesheet" type="text/css" />
@endpush

@section('contenido')
    <div class="md:flex md:item-center">
        <div class="md:w-1/2 px-10">

        </div>
        <div class="md:w-1/2 p-10 bg-white rounded-lg shadow-xl mt-10 mt:mt-0">
            <form action="{{route('grupos.store')}}" method="POST">
                @csrf
                <div class="mb-5">
                    <label for="titulo" class="mb-2 block uppercase text-gray-500 font-bold">
                        Nombre
                    </label>
                    <input name="nombre" type="text" placeholder="Nombre del grupo" required>
                </div>
                <input
                    type="submit"
                    value="Registrar"
                    class="bg-sky-600 hover:bg-sky-700 transistion-colors cursor-pointer uppercase font-bold w-full p-3 text-white rounded-lg"/>
            </form>
        </div>
    </div>
@endsection
