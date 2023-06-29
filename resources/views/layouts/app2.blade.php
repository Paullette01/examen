<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>@yield('titulo')</title>

<script src="https://cdn.tailwindcss.com"></script>
            @vite('resources/css/app.css')
            @vite('resources/js/app.js')
            <link rel="preconnect" href="https://fonts.bunny.net">
            <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
            <link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />
        <!-- Insertar estilo de dropzone-->
        @stack('style')
    </head>
    <body class="">
        <!-- Encabezado de la pagina-->
        <header class="p-5 boreder-b bg-white shadow">
            <div class="container mx-auto flex justify-between items-center">
                <!-- Menu cuando no estes autenticado -->
                @guest
                    <nav class="flex gap-2 items-center">
                        <a class="font-bold uppercase text-gray-600 text-sm" href="{{route('alumnos.index')}}">Registrar alumnos</a>
                        <a class="font-bold uppercase text-gray-600 text-sm" href="{{route('alumnos.verAlumnos')}}">Ver alumnos</a>

                        <a class="font-bold uppercase text-gray-600 text-sm" href="{{route('alumnas.index')}}">Registrar alumnas</a>
                        <a class="font-bold uppercase text-gray-600 text-sm" href="{{route('alumnas.verAlumnas')}}">Ver alumnas</a>

                        <a class="font-bold uppercase text-gray-600 text-sm" href="{{route('grupos.index')}}">Registrar grupos</a>
                        <a class="font-bold uppercase text-gray-600 text-sm" href="{{route('grupos.verGrupos')}}">Ver grupos</a>
                    </nav>
                @endguest
            </div>
        </header>
        <!-- Contenido de las vistas -->
        <main class="container mx-auto MT-10">
            <h2 class="font-black text-center text-3xl mb-10 text-gray-800">
                @yield('titulo')
            </h2>
            @yield('contenido')
        </main>
        <!-- Pie de pagina -->
        <footer class="text-center p-5 text-gray-500 font-bold">
            Derechos reservados {{now()->year}}
        </footer>
    </body>
</html>
