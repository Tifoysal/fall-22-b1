<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function list()
    {
        return view('backend.pages.category.list');
    }

    public function createForm()
    {
        return view('backend.pages.category.create');
    }
}
