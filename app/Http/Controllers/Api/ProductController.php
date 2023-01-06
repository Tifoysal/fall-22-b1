<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\PreDec;

class ProductController extends Controller
{
    public function getProducts()
    {
       $products=Product::find(1);

       return response()->json([
          'success'=>true,
          'data'=>[],
          'message'=>'no data'
       ]);
    }

    public function storeProduct(Request $request)
    {

        $fileName=null;
        if($request->hasFile('image'))
        {
            // generate name
            $fileName=date('Ymdhmi').'.'.$request->file('image')->getClientOriginalExtension();
            $request->file('image')->storeAs('/uploads',$fileName);
        }

        //query builder-RAW query
        // eloquent ORM- Model Functions
        $product=Product::create([
            // table column name=>input field er name
            'category_id' => $request->category_id,
            'brand_id' => '1',
            'name' => $request->product_name,
            'image' => $fileName,
            'user_id' => 1,
            'stock' => $request->product_stock,
            'price' => $request->product_price,
            'status' => $request->status,
            'description' => $request->description
        ]);

        //convert
        // INSERT INTO products (category_id,name) VALUES($request->category_id,$request->product_name)
        return response()->json([
            'success'=>true,
            'data'=>$product,
            'message'=>'no data'
        ]);


    }
}
