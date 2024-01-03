<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;


class UserListController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::orderBy('id','asc')
                      ->where('role','user')
                      ->where('active',1)
                      ->paginate(5);
        return view('/users-list', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('users-create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
      $request->validate([
          'name' => 'required',
          'email' => 'required', Rule::unique('users', 'email'),
          'password' => 'required',
          'LRN' => 'required',
          '_token' => 'required',
      ]);

      $user = DB::table('users')->where('id',$request['id'])->first();

      if($user != null)
      {
        //Upate Users
        DB::table('users')->where('id',$request['id'])->update([
          'name' => $request['name'],
          'email' => $request['email'],
        ]);

        return redirect()->route('users-list.index')
                        ->with('success','Student has been edited successfully');
      }
      else {

            $user = DB::table('users')->where('email',$request['email'])->first();

            if($user == null)
            {
            //Create Users
            $user = DB::table('users')->where('LRN',$request['LRN'])->first();
              if($user == null)
                {
                  $request['password'] = bcrypt($request['password'] );
                  User::create($request->all());

                  return redirect()->route('users-list.index')
                              ->with('success','Student has been created successfully');
                }
                else {
                  return back()->withErrors(['LRN'=>'LRN already exist!']);
                }
            }
            else {
              return back()->withErrors(['email'=>'Email already exist!']);
            }
      }

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
      $users = DB::table('users')->where('id',$id)->first();


      return view('users-edit',['users' => $users]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
      DB::table('users')->where('id',$id)->update([
        'active' => 0
      ]);

      return redirect()->route('users-list.index')->with('success','Student has been deleted successfully');
    }
}
