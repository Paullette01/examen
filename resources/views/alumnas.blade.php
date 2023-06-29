@extends("layouts.app2")
@section('titulo')
    Registrar un nuevo alumna
@endsection

@push('styles')
    <link href="https://unpkg.com/dropzone@6.0.0-beta.1/dist/dropzone.css" rel="stylesheet" type="text/css" />
@endpush

@section('contenido')
    <div class="md:flex md:item-center">
        <div class="md:w-1/2 px-10">

        </div>
        <div class="md:w-1/2 p-10 bg-white rounded-lg shadow-xl mt-10 mt:mt-0">
            <form action="{{route('alumnas.store')}}" method="POST">
                @csrf
                <div class="mb-5">
                    <label for="nombre" class="mb-2 block uppercase text-gray-500 font-bold">
                        Nombre
                    </label>
                    <input name="nombre" type="text" placeholder="Nombre del alumna" required>
                </div>

                <div class="mb-5">
                    <label for="apellidos" class="mb-2 block uppercase text-gray-500 font-bold">
                        Apellidos
                    </label>
                    <input name="apellidos" type="text" placeholder="Apellidos del alumna" required>
                </div>

                <div class="mb-5">
                    <label for="fecha_nacimiento" class="mb-2 block uppercase text-gray-500 font-bold">
                        Fecha de Nacimiento
                    </label>
                    <input name="fecha_nacimiento" type="date" placeholder="Fecha de nacimiento del alumna" required>
                </div>

                <div class="mb-5">
                    <label for="grupo_id" class="mb-2 block uppercase text-gray-500 font-bold">
                        Grupo
                    </label>
                    <select name="grupo_id" required>
                        @foreach ($grupos as $grupo)
                            <option value="{{ $grupo->id }}">{{ $grupo->nombre }}</option>
                        @endforeach
                    </select>
                </div>

                <input
                    type="submit"
                    value="Registrar"
                    class="bg-sky-600 hover:bg-sky-700 transistion-colors cursor-pointer uppercase font-bold w-full p-3 text-white rounded-lg"/>
            </form>
        </div>
    </div>
@endsection
