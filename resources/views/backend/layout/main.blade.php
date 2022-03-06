<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <link type="image/png" rel="shortcut icon" href="{{ url('backend/images/logo.png') }}">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv="Content-Language" content="es">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Panel de control</title>
    <meta name="viewport"
        content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />
    <meta name="description" content="Panel de administracion">
    <meta name="msapplication-tap-highlight" content="no">
    <link href="{{ url('backend/css/main.css') }}" rel="stylesheet">
    @yield('links')
    <style>
        .scrollbar-sidebar::-webkit-scrollbar {
            width: 8px;
            /* Tamaño del scroll en vertical */
            height: 8px;
            /* Tamaño del scroll en horizontal */

            /* Ocultar scroll */
        }

        .scrollbar-sidebar::-webkit-scrollbar-thumb {
            background: #ccc;
            border-radius: 4px;
        }

        /* Cambiamos el fondo y agregamos una sombra cuando esté en hover */
        .scrollbar-sidebar::-webkit-scrollbar-thumb:hover {
            background: #b3b3b3;
            box-shadow: 0 0 2px 1px rgba(0, 0, 0, 0.2);
        }

        /* Cambiamos el fondo cuando esté en active */
        .scrollbar-sidebar::-webkit-scrollbar-thumb:active {
            background-color: #999999;
        }

    </style>
</head>

<body>
    <div class="app-container app-theme-white body-tabs-shadow fixed-sidebar fixed-header">
        @include('backend.layout.topMenu')
        <div class="app-main">
            @include('backend.layout.sideMenu')
            <div class="app-main__outer">
                <div class="app-main__inner">
                    @yield('contenido')
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="{{ url('backend/js/main.js') }}"></script>
    @yield('js')
</body>
@yield('modals')
</html>
