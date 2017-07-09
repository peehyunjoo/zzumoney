<!doctype html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
	    <script src="{{mix('js/all.js')}}"></script>
        <link href="{{mix('css/app.css')}}" rel="stylesheet" type="text/css">

        @yield('style')
        @yield('script')
    </head>
    <body>
        <div class="container-fluid">
                        @include('layout.nav')
        </div>
	@yield('content')
    </body>
</html>
