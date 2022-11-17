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
//            'image'=>'required|mimes:jpeg,jpg,png,gif'
            'image'=>'required'
        ]);

        $fileName=null;
        if($request->hasFile('image'))
        {
            // generate name
            $fileName=date('Ymdhmi').'.'.$request->file('image')->getClientOriginalExtension();
            $request->file('image')->storeAs('/uploads',$fileName);
        }


        Product::create([
            'category_id' => $request->category_id,
            'name' => $request->product_name,
            'image' => $fileName,
            'stock' => $request->product_stock,
            'price' => $request->product_price,
            'status' => $request->status,
            'description' => $request->description
        ]);

        return redirect()->back()->with('message','Product Created Successful.');


    }

    public function deleteProduct(int $product_id)
    {
           $test=Product::find($product_id);
             if($test)
             {
                 $test->delete();
                 return redirect()->back()->with('message','product deleted successfully.');
             }else{
                 return redirect()->back()->with('error','product not found.');
             }


//        Product::findOrFail($product_id)->delete();
//        return redirect()->back()->with('message','product deleted successfully.');
    }

    public function viewProduct($product_id)
    {
      $product=Product::find($product_id);
      return view('backend.pages.products.view',compact('product'));
    }
}
