<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class WebHomeController extends Controller
{
    public function webHome()
    {
        $products=Product::where('status','active')->get();

        return view('frontend.pages.home',compact('products'));
    }
}
