<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        
        <link rel="stylesheet" href="{{asset('css/app.css')}}">
        

        <title>{{config('app.name', 'lsapp')}}</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
       
    </head>
    <body>
        @include('inc.nav')
        <div class="container">
            @include('inc.messages')
            @yield('content')
        </div>


        
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="{{ asset('js/app.js') }}"></script>

        <script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
        <script>
                CKEDITOR.replace( 'article-ckeditor' );
            </script>
        </body>
</html>