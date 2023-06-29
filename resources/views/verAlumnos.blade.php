@extends("layouts.app2")
@section('titulo')
    Ver alumnos
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
                        <th>Apellidos</th>
                        <th>Edad</th>
                        <th>Fecha de Nacimiento</th>
                        <th>Grupo</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($alumnos as $alumno)
                    <tr>
                        <td class="p-5">{{ $alumno->nombre }}</td>
                        <td class="p-5">{{ $alumno->apellidos }}</td>
                        @php

                            // Calcular edad

                            $fechaActual = new DateTime(); // Fecha actual
                            $fechaNac = new DateTime($alumno->fecha_nacimiento); // Fecha de nacimiento

                            $edad = $fechaNac->diff($fechaActual)->y; // Cálculo de la diferencia en años

                            echo '<td class="p-5">'. $edad .'</td>';

                        @endphp
                        <td class="p-5">{{ $alumno->fecha_nacimiento }}</td>
                        <td class="p-5">{{ $alumno->grupo->nombre }}</td>
                        <td class="p-5">
                            <form action="{{ route('alumnos.destroy', $alumno->id) }}" method="POST" style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit">Eliminar</button>
                            </form>
                        </td class="p-5">
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
