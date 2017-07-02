<!doctype html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
	<link rel="stylesheet" type="text/css" href="/../../vendor/twbs/bootstrap/dist/css/bootstrap.min.css"/>
	<link href="{{asset('css/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css">
	<style>
        .container{
                margin-top:15%;
        }
	</style>

    </head>
    <body>
	<div class="container">
        <div style="text-align:center;font-size:50px;">project</div>
        <form class="form-horizontal" action="/login/login" method="post" onsubmit="return check();">
                <div class="form-group">
                        <label for="user_id" class="col-sm-2 control-label">ID</label>
                        <div class="col-sm-10">
                                <input type="text" class="form-control" name="user_id" id="user_id" placeholder="ID">
                        </div>
                </div>
                <div class="form-group">
                        <label for="password" class="col-sm-2 control-label">Password</label>
                        <div class="col-sm-10">
                                <input type="password" class="form-control" name="password" id="password" placeholder="Password">
                        </div>
                </div>
                <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                                <button type="submit" class="btn btn-default">Sign in</button>
                        </div>
                </div>
        </form>
	</div>

    </body>
</html>
