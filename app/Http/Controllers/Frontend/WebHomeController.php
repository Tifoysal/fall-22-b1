<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserFormRequest;
use App\Mail\OrderEmail;
use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class WebHomeController extends Controller
{

    public function changeLanguage($lang)
    {
        session()->put('loc',$lang);
        return redirect()->back();

    }

    public function webHome()
    {
        $products=Product::all();

        // Select * from categories where status='active' OR gender='male' AND age='20';

        return view('frontend.pages.home',compact('products'));
    }

    public function registration(UserFormRequest $request)
    {
        User::create([
           'first_name'=>$request->customer_first_name,
           'last_name'=>$request->customer_last_name,
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

    public function profile()
    {
        return view('frontend.pages.profile');
    }

    public function updateProfile(Request $request)
    {
       //validation

        $user=User::find(auth()->user()->id);
        $user->update([
           'name'=>$request->user_name,
           'address'=>$request->user_address,
           'mobile'=>$request->user_mobile,
        ]);

        notify()->success('User profile updated.');
        return redirect()->back();
    }

    public function search(Request $request)
    {

        $searchResult=Product::where('name','LIKE','%'.$request->search_key.'%')->get();

      return view('frontend.pages.search',compact('searchResult'));
    }

    public function categoryWiseProducts($category_id)
    {
        $products=Product::where('category_id',$category_id)->get();

       return view('frontend.pages.category_wise_products',compact('products'));
    }

    public function productView($product_id)
    {
        $product=Product::find($product_id);
        return view('frontend.pages.product_view',compact('product'));

    }

    public function viewBuyForm($product_id)
    {
    $product=Product::find($product_id);
        return view('frontend.pages.buy_now',compact('product'));
    }

    public function orderCreate(Request $request,$product_id)
    {

        // create the order
        Order::create([
           'user_id'=>auth()->user()->id,
           'product_id'=>$product_id,
           'receiver_name'=>$request->first_name,
           'receiver_email'=>$request->email,
        ]);

        Mail::to($request->email)->send(new OrderEmail());

        notify()->success('Order placed Success.');
        return redirect()->route('home');

    }
}
