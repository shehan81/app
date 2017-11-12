<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Laravel</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <link href="{{asset('node_modules/bootstrap/dist/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css">
    </head>
    <body>
        <div class="container">
            <hr/>
            <div class="row">
                <div class="col-md-4">
                    <a href="{{route('home')}}">Home</a>
                </div>
                <div class="col-md-2">
                    <a href="{{route('resource.index')}}">Resources</a>
                </div>
                <div class="col-md-4">
                    <a href="{{route('logout')}}">Logout</a>
                </div>
            </div>
            <hr>
            @yield('content')
            <hr/>
        </div>
        <script src="{{asset('node_modules/jquery/dist/jquery.min.js')}}"></script>
        @yield('scripts')
    </body>
</html>
