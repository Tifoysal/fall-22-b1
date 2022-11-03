<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function list(){

        $brand_list=Brand::all();
        return view('backend.pages.brand.list',compact('brand_list'));
    }

    public function showForm()
    {
        return view('backend.pages.brand.create');
    }

    public function store(Request $request)
    {
        Brand::create([
           'name'=>$request->brand_name,
            'description'=>$request->brand_description,
            'status'=>$request->brand_status
        ]);

        return redirect()->back();


    }
}
