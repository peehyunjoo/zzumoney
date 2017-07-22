<?php

namespace App\Http\Controllers;
use Closure;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
#use Illuminate\Support\Facades\Auth;
use Auth;
class AccountController extends Controller
{
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */

    public function __construct()
    {
        if (!Auth::check()) {
            return redirect('/');
        }
    }

    public function index(request $request)
    {
	/*if($_GET){
		$date =	$_GET['date'];
	}else{
		$date  = date('Y-m');
	}*/
	if($request->input('date')){
		$date=$request->input('date');
	}else{
		$date=date('Y-m');
	}
		
        if(!Auth::check()){
            return redirect('/');
        }
        #$amount=\App\Account::all();
	$amount=\App\Account::where('user_id', '=' , auth()->user()->id )
			     ->where('date','like','%'.$date.'%')
			     ->orderBy('date')
		    	     ->get();
	$income = 0;
	$expenditure = 0;
	$etc_income = 0;
	$etc_expenditure = 0;
	$except_totalsum = 0;
	foreach($amount as $amounts){
		if($amounts->expense_type == '1'){
			$income+=$amounts->amount;
		}
	}
	foreach($amount as $amounts){
                if($amounts->expense_type == '2'){
                        $expenditure+=$amounts->amount;
                }
        }
	foreach($amount as $amounts){
                if($amounts->expense_type == '1' && $amounts->type != 'd'){
                        $etc_income+=$amounts->amount;
                }
        }
	foreach($amount as $amounts){
                if($amounts->expense_type == '2' && $amounts->type != 'd'){
                        $etc_expenditure+=$amounts->amount;
                }
        }
	$totalsum = $income - $expenditure;
	#$except_totalsum = $income - $expenditure + $etc_expenditure;
	
	$sum = array($income,$expenditure,$etc_income,$etc_expenditure,$totalsum);
	#$amount=\App\Account::join('users','accounts.user_id','=','users.id')->select('users.','accounts.user_id')->get();
        return view('account.list',compact('amount','date','sum'));
    }

    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function create()
    {
        return view('account.add');
    }

    /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
    public function store(Request $request)
    {
        $rule =[
            'date' =>['required'],
            'history' => ['required'],
            'amount' =>['required'],
        ];
        $validator = Validator::make($request->all(), $rule);
        if ($validator->fails()) {
            return redirect('account/create')->withErrors($validator)->withInput();
        }
        $amount = \App\User::find(auth()->user()->id)->accounts()->create([
            'expense_type'=>$request->input('gridRadios'),
            'type'=>$request->input('type'),
            'account_name'=>$request->input('history'),
            'amount'=>$request->input('amount'),
            'date'=>$request->input('date'),
        ]);
        /*$amount=\App\Account::create([
        'expense_type'=>$request->input('gridRadios'),
        'type'=>$request->input('type'),
        'account_name'=>$request->input('history'),
        'amount'=>$request->input('amount'),
        'date'=>$request->input('date'),
    ]);*/
    /*echo $request->input('type');
    echo $request->input('gridRadios');
    echo $request->input('date');*/
    return redirect('account');
    }

    /**
    * Display the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function show($id)
    {
        echo "show";
    }

    /**
    * Show the form for editing the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function edit($id)
    {
        $amount=\App\Account::where('idx', '=',$id)->get();
        return view('account.edit',compact('amount'));
    }


    /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function update(Request $request, $id)
    {
        $rule =[
            'date' =>['required'],
            'history' => ['required'],
            'amount' =>['required'],
        ];
        $validator = Validator::make($request->all(), $rule);
        if ($validator->fails()) {
            return redirect('account/create')->withErrors($validator)->withInput();
        }
        $amount = \App\Account::where('idx','=',$id)->update([
            'expense_type'=>$request->input('gridRadios'),
            'type'=>$request->input('type'),
            'account_name'=>$request->input('history'),
            'amount'=>$request->input('amount'),
            'date'=>$request->input('date'),
        ]);
        return redirect('account');
    }

    /**
    * Remove the specified resource from storage.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function destroy($id)
    {
        $amount = \App\Account::where('idx','=',$id)->delete();
        return redirect('account');
    }
}
