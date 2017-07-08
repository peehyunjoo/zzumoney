@extends('layout.container')
@section('content')
<style>
        .container{
                margin-top:15%;
        }
</style>
<div class="container">
<form action="{{ route('register') }}" method="POST" class="form_auth">
	 {!! csrf_field() !!}
	<div class="form-group" {{ $errors->has('name') ? 'has-error' : '' }}">
		<input type="text" name="name" class="form-control" placeholder="name" value="{{ old('name') }}" autofocus/>
                {!! $errors->first('name', '<span class="form-error">:message</span>') !!}
	</div>
	<div class="form-group" {{ $errors->has('password') ? 'has-error' : '' }}">
                <input type="password" name="password" class="form-control" placeholder="password" value="{{ old('password') }}" autofocus/>
                {!! $errors->first('password', '<span class="form-error">:message</span>') !!}
        </div>
	<div class="form-group" {{ $errors->has('email') ? 'has-error' : '' }}">
                <input type="text" name="email" class="form-control" placeholder="email" value="{{ old('email') }}" autofocus/>
                {!! $errors->first('email', '<span class="form-error">:message</span>') !!}
        </div>
	<div class="form-group">
                <button class="btn btn-primary btn-lg btn-block" type="submit">register</button>
        </div>
</form>
</div>
@stop
