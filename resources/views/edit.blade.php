@extends('layout.container')
<style>
	#selectbox{
		display:none;
	}
	.default{
		display:none;
	}
</style>
@section('content')
<script>
	$(document).ready(function(){
                $("#inlineRadio2").click(function(){
			//$("#selectbox").css("display","block");
			$("#selectbox").show();
			$(".gift").attr("selected","selected");
			$(".default").removeAttr("selected");
                });
		$("#inlineRadio1").click(function(){
			$("#selectbox").hide();
			$(".default").attr("selected","selected");
			$(".gift").removeAttr("selected");
		});
	});
</script>

<div class="container">
  <form method="POST" action="{{ route('account.update',$amount[0]->idx)}}">
		{{ method_field('PATCH') }}

	 {!! csrf_field() !!}
		<nav class="navbar"></nav>

		<div class="form-group row">
		<div class="form-check form-check-inline">
          			<label class="form-check-label">
            				<input class="form-check-input" type="radio" name="gridRadios" id="gridRadios1" value="1" checked>수입
          			</label>
		</div>
		<div class="form-check form-check-inline">
          			<label class="form-check-label">
            				<input class="form-check-input" type="radio" name="gridRadios" id="gridRadios2" value="2">지출
          			</label>
		</div> &nbsp;|
		<div class="form-check form-check-inline">
	  		<label class="form-check-label">
	    			<input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1" checked>기본
	  		</label>
		</div>
		<div class="form-check form-check-inline">
	  		<label class="form-check-label">
	    			<input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">기타
	  		</label>
		</div>&nbsp;
		<select class="form-control col-sm-2" name="type" id="selectbox">
			<option class="default" value="d">기본</option>
  			<option class="gift" value="g" >상품권</option>
			<option class="welfare" value="w">복지카드</option>
		</select>
		</div>
		@forelse($amount as $data)
    <div class="form-group row">
    	<label for="date" class="col-sm-2 col-form-label">날짜</label>
      		<div class="col-sm-10" {{ $errors->has('date') ? 'has-error' : '' }}">
        		<input type="date" class="form-control" id="date" name="date" value="{{$data->date}}" autofocus/>
				{!! $errors->first('date', '<span class="form-error">:message</span>') !!}
      		</div>
    </div>

    <div class="form-group row">
    	<label for="history" class="col-sm-2 col-form-label">내역</label>
      		<div class="col-sm-10" {{ $errors->has('history') ? 'has-error' : '' }}">
        		<input type="text" class="form-control" id="history" name="history" value="{{$data->account_name}}" autofocus/>
				{!! $errors->first('history', '<span class="form-error">:message</span>') !!}
      		</div>
    </div>

    <div class="form-group row">
    	<label for="amount" class="col-sm-2 col-form-label">금액</label>
      		<div class="col-sm-10" {{ $errors->has('amount') ? 'has-error' : '' }}">
        		<input type="text" class="form-control" id="amount" name="amount" value="{{$data->amount}}" autofocus/>
				{!! $errors->first('amount', '<span class="form-error">:message</span>') !!}
      		</div>
    </div>

    <div class="form-group row">
    	<div class="offset-sm-2 col-sm-10">
        	<button type="submit" class="btn btn-primary">수정</button>
      	</div>
    </div>
	<div>@empty</div>
	@endforelse
  </form>
</div>
@stop
