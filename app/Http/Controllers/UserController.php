<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function list()
    {
        return view('backend.pages.user.list');
    }

    public function create(){
        $title='New User';
        $subtitle='Enter all information';
        return view('backend.pages.user.create',compact('title','subtitle'));
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
        return redirect()->back()->with('message','Logout successful.');
    }
}
