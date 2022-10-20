<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function showHomePage()
    {

        return view('backend.pages.dashboard');
    }

    public function about()
    {
        return view('backend.pages.about');
    }

    public function contact()
    {
        return view('backend.pages.contact');
    }

}
