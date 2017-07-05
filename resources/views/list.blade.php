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
	<a class="btn btn-primary" href="{{ url('account') }}"  role="button">Add</a>
  </form>
</nav>
	<table class="table">
	  <thead>
	    <tr>
	      <th>date</th>
	      <th>amountname</th>
	      <th>amount</th>
	    </tr>
	  </thead>
	  <tbody>
	    <tr>
	      <td>5date</td>
	      <td>lunch</td>
	      <td>-5000</td>
	    </tr>
	  </tbody>
	</table>
</div>
@stop
