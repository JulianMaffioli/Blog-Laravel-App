<!DOCTYPE html>

{{-- THIS IS A BASIC LAYOUT JUST FOR THE HOME INDEX --}}
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>

        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

        {{-- CSS Reference --}}
        <link rel="stylesheet" href="{{asset('css/index.css')}}">

        <!-- Bootstrap ref -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

        {{-- JavaScript Reference --}}
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"
            integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous">
        </script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js"
            integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous">
        </script>

        {{-- CKEditor Reference --}}
        <script src="//cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
    </head>

    <body>
        @include('includes.navbar')

        @if ((URL::current() == url('/'))||(URL::current() == url('/home')))


          
            @yield('content')



        @else
            <div class="container">
                <br>
                <div class="card">
                    <div class="card-body">
                        @include('includes.messages')
                        @yield('content')
                    </div>
                </div>
            </div>
        @endif

    </body>

</html>

