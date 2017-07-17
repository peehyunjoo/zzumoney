<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

use Auth;

class FixAccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fix_amount=\App\FixAccount::all();
        return view('fix_account.list',compact('fix_amount'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('fix_account.add');
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
            return redirect('fix_account/create')->withErrors($validator)->withInput();
        }
        $amount = \App\User::find(auth()->user()->id)->fix_accounts()->create([
            'expense_type'=>$request->input('gridRadios'),
            'type'=>$request->input('type'),
            'account_name'=>$request->input('history'),
            'amount'=>$request->input('amount'),
            'date'=>$request->input('date'),
        ]);
	/*$amount = \App\User::find(auth()->user()->id)->accounts()->create([
            'expense_type'=>$request->input('gridRadios'),
            'type'=>$request->input('type'),
            'account_name'=>$request->input('history'),
            'amount'=>$request->input('amount'),
            'date'=>$request->input('date'),
        ]);*/

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
	echo $id;exit;
        return view('fix_account.add');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $fix_amount=\App\FixAccount::where('idx', '=',$id)->get();
        return view('fix_account.edit',compact('fix_amount'));
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
            return redirect('fix_account/create')->withErrors($validator)->withInput();
        }
        $amount = \App\FixAccount::where('idx','=',$id)->update([
            'expense_type'=>$request->input('gridRadios'),
            'type'=>$request->input('type'),
            'account_name'=>$request->input('history'),
            'amount'=>$request->input('amount'),
            'date'=>$request->input('date'),
        ]);
        return redirect('fix_account');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        \App\FixAccount::where('idx', '=', $id)->delete();
        return redirect('fix_account');
    }
}
