<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function list()
    {
        $users=User::all();
        return view('backend.pages.user.list',compact('users'));
    }

    public function create(){
        $title='New User';
        $subtitle='Enter all information';
        $roles=Role::all();
        return view('backend.pages.user.create',compact('title','subtitle','roles'));
    }

    public function store(Request $request)
    {
       $validate=Validator::make($request->all(),[
          'first_name'=>'required',
          'last_name'=>'required',
          'password'=>'required|min:6',
          'email'=>'required|email|unique:users',
          'role_id'=>'required|exists:roles,id',
       ]);
       if($validate->fails())
       {
           notify()->error($validate->getMessageBag());
           return redirect()->back();
       }

       User::create([
          'first_name'=>$request->first_name,
          'last_name'=>$request->last_name,
          'password'=>bcrypt($request->password) ,
          'role_id'=>$request->role_id ,
          'email'=>$request->email ,
          'mobile'=>$request->mobile
       ]);

       notify()->success('User created successfully.');
return redirect()->back();
    }

    public function login()
    {
        return view('backend.pages.login');
    }

    public function doLogin(Request $request)
    {

        $credentials=$request->except('_token');
//        $credentials=$request->only(['email','password']);

        if(Auth::attempt($credentials))
        {
            return redirect()->route('dashboard');
        }
        return redirect()->back()->with('message','invalid credentials');

    }


    public function logout()
    {
        Auth::logout();
        return redirect()->route('login')->with('message','Logout successful.');
    }
}
