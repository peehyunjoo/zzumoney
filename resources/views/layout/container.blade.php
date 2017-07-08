<!doctype html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
	<script src="//code.jquery.com/jquery.min.js"></script>
        <link href="{{asset('css/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css">

        @yield('style')
        @yield('script')
    </head>
    <body>
        <div class="container-fluid">
                        @include('nav')
        </div>
	@yield('content')
    </body>
</html>
