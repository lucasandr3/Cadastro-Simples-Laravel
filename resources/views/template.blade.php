<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1" />

        <title>@yield('title')</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet" />

        <!-- Styles -->
        <link rel="stylesheet" href="{{url('assets/css/style.css')}}" />

    </head>
    <body class="antialiased">
        <nav>
            <a href="{{url('/cadastro/empresa')}}">Cadastro de Empresas</a>
            <a href="{{url('/cadastro/fornecedor')}}">Cadastro de Fornecedores</a>
            <a href="{{url('/fornecedores')}}">Lista de Fornecedores</a>
        </nav>
        <section class="container">
            @yield('content')
        </section>
    </body>

    <script src="{{url('assets/js/jquery-3.6.0.min.js')}}"></script>
    <script src="{{url('assets/js/jquery.mask.min.js')}}"></script>
    <script src="{{url('assets/js/main.js')}}"></script>
</html>