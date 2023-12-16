<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('titulo')</title>
    {{-- Libreria de estilos Boostrap 5 --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    {{-- Libreria de estilos w3schools BUSCAR QUITARLAS --}}
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    {{-- Libreria de estilos del mapa --}}
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
    {{-- Libreria de fuentes utilizadas --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    {{-- Libreria de estilos de tablas Jquery --}}
    <link href="https://cdn.datatables.net/v/bs5/dt-1.13.8/datatables.min.css" rel="stylesheet">
    {{-- Libreria de estilos personalizados --}}
    <link rel="stylesheet" href="/css/miEstilo.css">
</head>
<body>
    @livewireStyles
    @yield('cuerpo')

    @livewireScripts
    {{-- Libreria de scripts Jquery --}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    {{-- Libreria de scripts del mapa --}}
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
    {{-- Libreria de scripts de sweetAlert --}}
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    {{-- Libreria de scripts de tablas Jquery --}}
    <script src="https://cdn.datatables.net/v/bs5/dt-1.13.8/datatables.min.js"></script>
    {{-- Libreria de scripts boostrap --}}
    <script src="/js/bootstrap.bundle.min.js"></script>
    {{-- Libreria de scripts personalizados --}}
    <script src="/js/general/metodos.js"></script>
    @yield('scripts')
    @stack('scripts')
</body>
</html>

