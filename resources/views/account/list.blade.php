@extends('layout.container')
<style>
	.add{
		float:right;
	}
	.date_form{
		position:relative;
		top:2vh;
		text-align:center;
	}
	th,tr,.total{
		text-align:center !important;
	}
</style>
@section('content')
<div class="container">
	@php
                        $next_date=date('Y-m', strtotime($date.' + 1 month'));
                        $prev_date=date('Y-m', strtotime($date.' - 1 month'));
        @endphp
	<div class="date_form">
        	<h4><a href="{{url('account?date='.$prev_date)}}"><i class="fa fa-arrow-left" aria-hidden="true"></i></a> 
		{{ $date }}
        	<a href="{{url('account?date='.$next_date)}}"><i class="fa fa-arrow-right" aria-hidden="true"></i></a></h4>
        </div>
	<nav class="navbar navbar-light add">
  		<form class="form-inline">
			<a class="btn btn-outline-info" href="{{ url('account/create')}}"  role="button">추가</a>&nbsp;
    			<a class="btn btn-outline-info" href="{{ url('fix_account/create') }}"  role="button">고정등록</a>&nbsp
			<a class="btn btn-outline-info" href="{{ url('fix_account') }}"  role="button">고정리스트</a>&nbsp;
  		</form>
	</nav>
	<table class="table table-sm">
	  <thead>
	    <tr>
	      <th style="text-align:center">날짜</th>
	      <th style="text-align:center">내역</th>
	      <th style="text-align:center">지출/수입</th>
	      <th style="text-align:center">수정/삭제</th>
	    </tr>
	  </thead>
	<tbody>
		@forelse($amount as $data)
	    <tr>
	    <td>{{$data->date}}</td>
	    <td>{{$data->account_name}}</td>
	    <td>{{number_format($data->amount)}}</td>
	    <td><a class="btn btn-outline-primary hidden-sm-down" href="{{ route('account.edit', $data->idx)}}"  role="button">수정</a> &nbsp;
		<a class="btn btn-outline-danger hidden-sm-down delete" onclick="return confirm('삭제하시겠습니까?');" href="{{ route('account.destroy',$data->idx)}}" role="button">삭제</a>
		<!--모바일일때 fontawesome아이콘-->
		<a href="{{ route('account.edit', $data->idx)}}"><i class="fa fa-pencil hidden-md-up aria-hidden'true' " ></i></a> &nbsp;
                <a href="{{ route('account.destroy',$data->idx)}}" onclick="return confirm('삭제하시겠습니까?');"><i class="fa fa-times hidden-md-up"></i></a>
		</td>
	    </tr>
		@empty
    	    <tr>
      		<td colspan=2>empty</td>
    	    </tr>
    		@endforelse
    	</tbody>
	</table>
	<table class="table table-sm">
	<thead class="thead-default">
	    <tr>
	      <th>총수입</th>
	      <th>{{number_format($sum[0])}}</th>
	    </tr>
	    <tr>
              <th>총지출</th>
              <th>{{number_format($sum[1])}}</th>
            </tr>
	    <tr>
              <th>기타수입</th>
              <th>{{number_format($sum[2])}}</th>
            </tr>
            <tr>
              <th>기타지출</th>
              <th>{{number_format($sum[3])}}</th>
            </tr>
            <tr>  
              <th>총잔액</th>
              <th>{{number_format($sum[4])}}</th>
            </tr>
	  </thead>
	</table>
	<!--<div class="row total justify-content-center">
		<div class="col-4">총수입</div>
		<div class="col-4">{{number_format($sum[0])}}</div>
	</div>
	<div class="row total justify-content-center">
                <div class="col-4">총지출</div>
                <div class="col-4">{{number_format($sum[1])}}</div>
        </div>
	<div class="row total justify-content-center">
                <div class="col-4">기타수입</div>
                <div class="col-4">{{number_format($sum[2])}}</div>
        </div>
	<div class="row total justify-content-center">
                <div class="col-4">기타지출</div>
                <div class="col-4">{{number_format($sum[3])}}</div>
        </div>
	<div class="row total justify-content-center">
                <div class="col-4">총잔액</div>
                <div class="col-4">{{number_format($sum[4])}}</div>
        </div>
	</div>-->
</div>
@stop
