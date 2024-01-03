<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class RegisterController extends Controller
{
    public function create()
    {
        return view('session.register');
    }

    public function store()
    {
        $attributes = request()->validate([
            'name' => ['required', 'max:50'],
            'LRN' => ['required', 'max:12'],
            'email' => ['required', 'email', 'max:50', Rule::unique('users', 'email')],
            'password' => ['required', 'min:5', 'max:20'],
        ]);
        $attributes['password'] = bcrypt($attributes['password'] );

        $user = DB::table('users')->where('email',$attributes['email'])->first();

        if($user == null)
        {
          $user = DB::table('users')->where('LRN',$attributes['LRN'])->first();
        }


        if($user == null)
        {
        session()->flash('success', 'Your account has been created.');

        $attributes['role'] = 'user';
        $user = User::create($attributes);
        /**Auth::login($user);
        if($user->role == 'admin')
        {
          return redirect('/dashboard');
        }
        else {
          {
            return redirect('/survey');
          }
          **/
          return redirect('/login');
        }
        return back()->withErrors(['password'=>'LRN already exist!']);
        }

}
