<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use CustomAuth;



class SessionsController extends Controller
{
    public function create()
    {
        return view('session.login-session');
    }

    public function store()
    {
        $attributes = request()->validate([
            'LRN'=>'required',
            'password'=>'required'
        ]);

        $user = DB::table('users')
                          ->where('LRN', $attributes['LRN'])
                          ->first();

        $attributes['email'] = $user->email;

        if(Auth::attempt($attributes))
        {
            session()->regenerate();

            if(Auth::user()->role == 'admin')
            {
              return redirect('admin')->with(['success'=>'You are logged in.']);
            }
            else
            {
                return redirect('survey')->with(['success'=>'You are logged in.']);
            }
        }
        else{

            return back()->withErrors(['email'=>'Email or password invalid.']);
        }
    }

    public function destroy()
    {

        Auth::logout();

        return redirect('/login')->with(['success'=>'You\'ve been logged out.']);
    }
}
