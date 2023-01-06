<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function list()
    {
        $products=Product::where('user_id',auth()->user()->id)->with('categoryRelation')->get();
//    dd($products);
        return view('backend.pages.products.list',compact('products'));
    }

    public function create()
    {
        $categories = Category::all();

        return view('backend.pages.products.create',compact('categories'));
    }

    public function store(Request $request)
    {
//dd($request->all());
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

        //query builder-RAW query
        // eloquent ORM- Model Functions
        Product::create([
            // table column name=>input field er name
            'category_id' => $request->category_id,
            'brand_id' => '1',
            'name' => $request->product_name,
            'image' => $fileName,
            'user_id' => auth()->user()->id,
            'stock' => $request->product_stock,
            'price' => $request->product_price,
            'status' => $request->status,
            'description' => $request->description
        ]);

        //convert
        // INSERT INTO products (category_id,name) VALUES($request->category_id,$request->product_name)
        notify()->success('Product Created successfully.');
        return redirect()->back();


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

    public function edit($product_id)
    {
        $product=Product::find($product_id);
        $categories=Category::all();
        return view('backend.pages.products.edit',compact('categories','product'));
    }

    public function update(Request $request,$product_id)
    {

//        dd($request->all());
//        Product::find($product_id)->update([
//            'category_id' => $request->category_id,
//            'stock' => $request->product_stock,
//            'price' => $request->product_price,
//            'status' => $request->status,
//            'description' => $request->description
//        ]);

        $product=Product::find($product_id);
        $fileName=$product->image;

        if($request->hasFile('image'))
        {
            // generate name
            $fileName=date('Ymdhmi').'.'.$request->file('image')->getClientOriginalExtension();
            $request->file('image')->storeAs('/uploads',$fileName);
        }


        $product->update([
            'name' => $request->product_name,
            'image' => $fileName,
            'category_id' => $request->category_id,
            'stock' => $request->product_stock,
            'price' => $request->product_price,
            'status' => $request->status,
            'description' => $request->description
        ]);

        return redirect()->route('product.list')->with('message','Update success.');

    }
}
