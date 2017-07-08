@extends('layout.container')
@section('content')
<style>
        .container{
                margin-top:15%;
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
                                <button type="submit" class="btn btn-primary">
                                    Login
                                </button>
				<a class="btn btn-primary" role="button"  href=" {{ route('register') }}">
                                    register
				</a>
                            </div>
                        </div>
                    </form>
</div>

@stop
