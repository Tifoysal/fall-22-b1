<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function list()
    {
        $cats=Category::all();//select * from categories;
//        dd($cats);
        return view('backend.pages.category.list',compact('cats'));
    }


    public function createForm()
    {
        return view('backend.pages.category.create');
    }

    public function store(Request $request)
    {
//        dd($request->all());
        Category::create([
            //database column name => input field name
                'name'=>$request->category_name,
                'status'=>$request->status,
                'description'=>$request->description
        ]);

//        return redirect()->route('category.list');
        return redirect()->back();

    }
}
