@extends('layout.container')
<style>
	.add{
		float:right;
	}
</style>
@section('content')
<div class="container">
	<nav class="navbar navbar-light add">
</nav>
	<table class="table">
	  <thead>
	    <tr>
	      <th>날짜</th>
	      <th>내역</th>
	      <th>지출/수입</th>
	      <th>수정/삭제</th>
	    </tr>
	  </thead>
	<tbody>
		@forelse($fix_amount as $data)
	    <tr>
	    <td>{{$data->date}}</td>
	    <td>{{$data->account_name}}</td>
	    <td>{{number_format($data->amount)}}</td>
	    <td><a class="btn btn-primary" href="{{ route('fix_account.edit', $data->idx)}}"  role="button">수정</a> &nbsp;
		<a class="btn btn-primary" href="{{ route('fix_account.destroy',$data->idx)}}"  role="button">삭제</a>
		</td>
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
