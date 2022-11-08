<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function list()
    {
        $products=Product::paginate(10);

        return view('backend.pages.products.list',compact('products'));
    }

    public function create()
    {
        $categories=Category::all();

        return view('backend.pages.products.create',compact('categories'));
    }

    public function store(Request $request)
    {

        $request->validate([
            'product_name' => 'required',
            'product_price' => 'required|numeric',
            'product_stock' => 'required|numeric',
            'category_id' => 'required',
        ]);
        Product::create([
            'category_id' => $request->category_id,
            'name' => $request->product_name,
            'image' => $request->image,
            'stock' => $request->product_stock,
            'price' => $request->product_price,
            'status' => $request->status,
            'description' => $request->description
        ]);

        return redirect()->back()->with('message','Product Created Successful.');


    }
}
