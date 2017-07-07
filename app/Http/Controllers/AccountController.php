<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
/*validate not working

	protected function validator(array $data)
  	{
        	return Validator::make($data, [
            	'history' => 'required|string|min:2',
        	]);
    	}*/
    public function index()
    {
	$amount=\App\Account::all();
	return view('list',compact('amount'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
	return view('account');
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
	return redirect('list');	
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
        return view('edit',compact('amount'));
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
	return redirect('list');
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
	return redirect('list');
    }
}
