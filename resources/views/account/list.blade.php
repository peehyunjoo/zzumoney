@extends('layout.container')
<style>
	.add{
		float:right;
	}
</style>
@section('content')
<div class="container">
	<nav class="navbar navbar-light add">
  <form class="form-inline">
	<a class="btn btn-primary" href="{{ url('account/create')}}"  role="button">추가</a>&nbsp;
    <a class="btn btn-primary" href="{{ url('fix_account/create') }}"  role="button">고정등록</a>&nbsp
	<a class="btn btn-primary" href="{{ url('fix_account') }}"  role="button">고정리스트</a>&nbsp;
  </form>
</nav>
		@php
			$next_date=date('Y-m', strtotime($date.' + 1 month'));
			$prev_date=date('Y-m', strtotime($date.' - 1 month'));
		@endphp
	<a href="{{url('account?date='.$prev_date)}}"><i class="fa fa-arrow-left" aria-hidden="true"></i></a>{{ $date }}
	<a href="{{url('account?date='.$next_date)}}"><i class="fa fa-arrow-right" aria-hidden="true"></i></a>
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
		@forelse($amount as $data)
	    <tr>
	    <td>{{$data->date}}</td>
	    <td>{{$data->account_name}}</td>
	    <td>{{number_format($data->amount)}}</td>
	    <td><a class="btn btn-primary" href="{{ route('account.edit', $data->idx)}}"  role="button">수정</a> &nbsp;
		<a class="btn btn-primary" href="{{ route('account.destroy',$data->idx)}}"  role="button">삭제</a>
		<!--<form class="" action="{{ route('account.destroy', $data->idx) }}" method="DELETE">
    			<button type="submit" class="btn btn-danger">삭제</button>
		</form>-->
		</td>
	    </tr>
		@empty
    	    <tr>
      		<td colspan=2>empty</td>
    	    </tr>
    		@endforelse
    	</tbody>
	</table>
	<div>
	총수입: {{$sum[0]}}
	총지출:{{$sum[1]}}
	기타수입:{{$sum[2]}}
	기타지출:{{$sum[3]}}
	총잔액:{{$sum[4]}}
	</div>
</div>
@stop
