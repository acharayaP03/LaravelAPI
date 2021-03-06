<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        {{-- prevents from cross site forgery --}}
        <meta name="csrf_token" content="{{ csrf_token() }}">
        <script>window.Laravel = { csrfToken: '{{csrf_token()}}' } </script>
        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,600,700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    </head>
    <body>
        <div id="app">
            <navbar></navbar>
            <div class="container">
                <div class="jumbotron">
                    <h1 class="display-4">Articel</h1>
                    <p class="lead">This is a simple laravel and Vue project.</p>
                    <hr class="my-4">
                    <p>It uses laravel api at the backend and Vuejs in the front end. We have used boostrap as css template. </p>
                    <p class="lead">
                      <a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a>
                    </p>
                </div>
                <my-article></my-article>
            </div>
        </div>

        <script src="{{ asset('js/manifest.js') }}"></script>
        <script src="{{ asset('js/vendor.js')}}"></script>
        <script src="{{ asset('js/app.js')}}"></script>
    </body>
</html>
