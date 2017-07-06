@extends('layout.container')
<style>
	.add{
		float:right;
	}
</style>
@section('content')
<div class="container-fluid">
		@include('nav')
</div>
<div class="container">
	<nav class="navbar navbar-light add">
  <form class="form-inline">
	<a class="btn btn-primary" href="{{ url('account/create')}}"  role="button">추가</a>&nbsp;
        <a class="btn btn-primary" href="{{ url('fix_account/show?expense') }}"  role="button">고정지출</a>&nbsp;
        <a class="btn btn-primary" href="{{ url('fix_account/show?income') }}"  role="button">고정수입</a>&nbsp;
  </form>
</nav>
	<table class="table">
	  <thead>
	    <tr>
	      <th>날짜</th>
	      <th>내역</th>
	      <th>지출/수입</th>
	    </tr>
	  </thead>
	<tbody>
		@forelse($amount as $data)
	    <tr>
	    <td>{{$data->date}}</td>
	    <td>{{$data->account_name}}</td>
	    <td>{{number_format($data->amount)}}</td>
	    </tr>
		@empty
    	    <tr>
      		<td colspan=2>empty</td>
    	    </tr>
    		@endforelse
    	</tbody>
	</table>
</div>
@stop
