<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home()
    {
        $name=now();
        return view('backend.pages.dashboard',compact('name'));
    }

    public function aboutUs()
    {
        return view('backend.pages.about');
    }

    public function contactUs()
    {
     return view('backend.pages.contact');
    }
}
