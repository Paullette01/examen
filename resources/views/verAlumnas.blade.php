@extends("layouts.app2")
@section('titulo')
    Ver alumnas
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
                    @foreach ($alumnas as $alumna)
                    <tr>
                        <td class="p-5">{{ $alumna->nombre }}</td>
                        <td class="p-5">{{ $alumna->apellidos }}</td>
                        @php

                            // Calcular edad

                            $fechaActual = new DateTime(); // Fecha actual
                            $fechaNac = new DateTime($alumna->fecha_nacimiento); // Fecha de nacimiento

                            $edad = $fechaNac->diff($fechaActual)->y; // Cálculo de la diferencia en años

                            echo '<td class="p-5">'. $edad .'</td>';

                        @endphp
                        <td class="p-5">{{ $alumna->fecha_nacimiento }}</td>
                        <td class="p-5">{{ $alumna->grupo->nombre }}</td>
                        <td class="p-5">
                            <form action="{{ route('alumnas.destroy', $alumna->id) }}" method="POST" style="display: inline-block;">
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
