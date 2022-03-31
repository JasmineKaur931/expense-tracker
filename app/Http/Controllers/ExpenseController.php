<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ExpenseReport;
use App\Models\User;

use Illuminate\Support\Facades\Auth;
use Session;
//use Auth;

class ExpenseController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    public function addexpense()
    {
        return view('addexpense');
    }

    public function addincome()
    {
        return view('addincome');
    }

    public function expense(Request $req)
    {
        if(Session::has('loginId'))
        {
            $req->validate([
            'amount'=>'required',
            'category'=>'required'
            ]);

            //$balance = User::select('balance')->where('id', '=', Session::get('loginId'))->first();
            //$balance = User::select('balance')->where('id', '=', Session::get('loginId'))->get();
            $balance = User::where('id', '=', Session::get('loginId'))->value('balance');
            if($balance > $req->amount)
            {
                $cur_bal = $balance - $req->amount;
                $balance = User::where('id', '=', Session::get('loginId'))->update(['balance'=>$cur_bal]);
            
                $type = "Expense";
                $report = new ExpenseReport();

                $report->amount = $req->amount;
                $report->category = $req->category;
                $report->type = $type;
                //$id = Auth::user()->id;
                //$report->user_id = auth()->user()->id;
                //$report->user_id = Auth::user()->id; working
                //$report->user_id = optional(Auth::user())->id;
                //$report->user_id = $req->session()->get('user')['id'];
                //error_log('Hello');
                $report->user_id =  Session::get('loginId');
                //$report->user_id =  dd($user->id);
                $res = $report->save();

                if($res)
                {
                    return back()->with("success", "Expense added successfully");
                }
                else
                {
                    //return redirect('home');
                    return back()->with('fail', 'Something went wrong');
                } 
            }
            else
            {
                return('Not enough balance');
            } 
    }
        else{
            return redirect('login');
        }
    }

    public function income(Request $req)
    {
        if(Session::has('loginId'))
        {
            $req->validate([
            'amount'=>'required',
            'category'=>'required'
            ]);

            $balance = User::where('id', '=', Session::get('loginId'))->value('balance');
        
            $cur_bal = $balance + $req->amount;
            $balance = User::where('id', '=', Session::get('loginId'))->update(['balance'=>$cur_bal]);
        
            $type = "Income";
            $report = new ExpenseReport();

            $report->amount = $req->amount;
            $report->category = $req->category;
            $report->type = $type;
            $report->user_id =  Session::get('loginId');
            //$report->user_id =  dd($user->id);
            $res = $report->save();

            if($res)
            {
                //return redirect('home');
                return back()->with("success", "Income added successfully");
            }
            else
            {
                //return redirect('home');
                return back()->with('fail', 'Something went wrong');
            } 
            
        }
        else{
            return redirect('login');
        }
    }

    public function display()
    {
        $data = array();
        if(Session::has('loginId'))
        {
            //$data = ExpenseReport::where('user_id', '=', Session::get('loginId'))->first();
            //$data = ExpenseReport::find( Session::get('loginId'));
            $data = ExpenseReport::where('user_id', '=', Session::get('loginId'))->orderBy('created_at', 'desc')->get();
            return view('report', compact('data'));
            //return view('report', ['reports' => data]);
        }
        else
        {
            return view('home');
        }
    }

}
