@extends('layout.container')
@section('content')
<style>
        .container{
                top:15vh;
        }
        hr{
            margin:1.5em 0em;
        }
        </style>

<div class="container">
<div style="text-align:center;font-size:50px;">project</div>
	<form class="form-horizontal" role="form" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 offset-md-2 control-label">E-Mail Address</label>

                            <div class="col-md-8 offset-md-2">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 offset-md-2 control-label">Password</label>

                            <div class="col-md-8 offset-md-2">
                                <input id="password" type="password" class="form-control" name="password" required>
                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>

                        <div class="form-group">
                            <div class="col-md-4 offset-md-2">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-8 offset-md-2">
				@if(Session::has('flash_message'))
        			<span>{!! session('flash_message') !!}</span>
				@endif
                                <button type="submit" class="btn btn-primary btn-block">
                                    Login
                                </button>
				<a href="{{ route('register') }}" class="btn btn-primary btn-block"><i class=""></i> 회원가입</a><hr>
                <a href="social/github" class="btn btn-secondary btn-block"><i class="fa fa-github"></i> 깃허브로 로그인</a>
                            </div>
                        </div>
                    </form>
</div>

@stop
