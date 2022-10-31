<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
}
