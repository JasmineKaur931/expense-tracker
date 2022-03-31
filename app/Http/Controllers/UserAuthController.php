<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Hash;
use Session;

class UserAuthController extends Controller
{
    //
    public function login()
    {
        return view('login');
    }
    public function signup()
    {
        return view('signup');
    }

    public function signupUser(Request $req)
    {
        $req->validate([
            'name'=>'required',
            'email'=>'required | email| unique:users',
            'balance'=>'required',
            'password'=>'required | min:6'
        ]);
        $user  = new User();

        $user->name = $req->name;
        $user->email = $req->email;
        $user->balance = $req->balance;
        $user->password = Hash::make($req->password); 
        $res = $user->save();
        if($res)
        {
           return back()->with("success", "User registered successfully");
        }
        else
        {
           return back()->with('fail', 'Something went wrong');
        }    
    }

    public function loginUser(Request $req)
    {
        $req->validate([
            'email'=>'required | email',
            'password'=>'required | min:6'
        ]);
        $user = User::where('email', '=', $req->email)->first();
        if($user)
        {
            if(Hash::check($req->password, $user->password))
            {
                $req->session()->put('loginId', $user->id);
                return redirect('home');
            }
            else
            {
                return back()->with('fail', 'Invalid Password');
            }
        }
        else{
            return back()->with('fail', 'This email is not registered');
        }
    }

    public function home()
    {
        $data = array();
        if(Session::has('loginId'))
        {
            $data = User::where('id', '=', Session::get('loginId'))->first();
        }
        return view('home', compact('data'));
    }

    public function logout()
    {
        if(Session::has('loginId')) 
        {
            Session::pull('loginId');
            return redirect('login');
        }
    }
}
