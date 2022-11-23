<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class WebHomeController extends Controller
{
    public function webHome()
    {
        $products=Product::where('status','active')->get();
        $categories=Category::where('status','active')->get();

        // Select * from categories where status='active' OR gender='male' AND age='20';

        return view('frontend.pages.home',compact('products','categories'));
    }

    public function registration(Request $request)
    {

        User::create([
           'name'=>$request->customer_name,
           'email'=>$request->customer_email,
           'mobile'=>$request->customer_phone,
           'password'=> bcrypt($request->customer_password),
            'role'=>'customer'
        ]);

        return redirect()->back()->with('message','Registration Success.');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email'=>'required|email',
            'password'=>'required',
        ]);

        $credentials=$request->except('_token');
        if(auth()->attempt($credentials))
        {
      notify()->success('Login success');
            return redirect()->back();
        }
        notify()->error('invalid password');
        return redirect()->back();
    }

    public function logout()
    {
        auth()->logout();
        notify()->success('logout success');
        return redirect()->back();
    }
}
