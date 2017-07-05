@extends('layout.container')
<style>
        .add{
                float:right;
        }
</style>
@section('content')
<div class="container-fluid">
                @include('nav')
<div class="container">
  <form action="" method="POST" action="{{ route('account.store') }}">
	 {!! csrf_field() !!}
	<fieldset class="form-group row">
      <div class="col-sm-10">
        <div class="form-check">
          <label class="form-check-label">
            <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios1" value="1" checked>
		수입
          </label>
          <label class="form-check-label">
            <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios2" value="2">
		지출
          </label>
        </div>
    </fieldset>
    <div class="form-group row">
      <label for="date" class="col-sm-2 col-form-label">날짜</label>
      <div class="col-sm-10" {{ $errors->has('date') ? 'has-error' : '' }}">
        <input type="date" class="form-control" id="date" name="date" value="{{ old('date') }}" autofocus/>
	{!! $errors->first('date', '<span class="form-error">:message</span>') !!}
      </div>
    </div>
    <div class="form-group row">
      <label for="history" class="col-sm-2 col-form-label">내역</label>
      <div class="col-sm-10" {{ $errors->has('history') ? 'has-error' : '' }}">
        <input type="text" class="form-control" id="history" name="history" value="{{ old('history') }}" autofocus/>
	{!! $errors->first('history', '<span class="form-error">:message</span>') !!}
      </div>
    </div>
    <div class="form-group row">
      <label for="account" class="col-sm-2 col-form-label">금액</label>
      <div class="col-sm-10" {{ $errors->has('account') ? 'has-error' : '' }}">
        <input type="text" class="form-control" id="account" name="account" value="{{ old('account') }}" autofocus/>
	{!! $errors->first('account', '<span class="form-error">:message</span>') !!}
      </div>
    </div>
    <div class="form-group row">
      <div class="offset-sm-2 col-sm-10">
        <button type="submit" class="btn btn-primary">등록</button>
      </div>
    </div>
  </form>
</div>
</div>
@stop
