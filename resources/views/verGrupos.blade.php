@extends("layouts.app2")
@section('titulo')
    Ver grupos
@endsection

@push('styles')
    <link href="https://unpkg.com/dropzone@6.0.0-beta.1/dist/dropzone.css" rel="stylesheet" type="text/css" />
@endpush

@section('contenido')
    <div class="md:flex md:item-center">
        <div class="flex justify-center items-center w-full">
            <table>
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($grupos as $grupo)
                    <tr>
                        <td>{{ $grupo->nombre }}</td>
                        <td>
                            <form action="{{ route('grupos.destroy', $grupo->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>
@endsection
