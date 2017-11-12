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
            <hr>
            <div class="row">
                <div class="col-md-4 col-md-offset-4">
                    <form method="post" action="{{route('login')}}">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <h1>Login form</h1>
                        </div>
                        
                        @if(count($errors) > 0)
                        <span class="help-block">
                            <ul>
                                @foreach($errors->all() as $error)
                                <li class="text-danger">{{ $error}}</li>
                                @endforeach
                            </ul>
                        </span>
                        @endif
                        
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email address</label>
                            <input type="text" name="username" class="form-control" id="username" aria-describedby="emailHelp" placeholder="Enter email">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Password</label>
                            <input type="password" name="password" class="form-control" id="password" placeholder="Password">
                        </div>
                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="checkbox" name="remember" value="1" class="form-check-input">
                                Check me out
                            </label>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
            <hr>
        </div>
    </body>
</html>
