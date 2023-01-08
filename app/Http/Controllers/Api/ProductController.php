<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    public function getProducts()
    {
        $products = Product::all();
        return $this->responseWithSuccess($products, 'all products');
    }

    public function storeProduct(Request $request)
    {
//        $request->validate([
//            'product_name'=>'required',
//            'status'=>'required'
//        ]);

        $validation = Validator::make($request->all(), [
            'product_name' => 'required',
            'status' => 'required'
        ]);

        if ($validation->fails()) {
            return $this->responseWithError($validation->getMessageBag());
        }

        $fileName = null;
        if ($request->hasFile('image')) {
            // generate name
            $fileName = date('Ymdhmi') . '.' . $request->file('image')->getClientOriginalExtension();
            $request->file('image')->storeAs('/uploads', $fileName);
        }
        //query builder-RAW query
        // eloquent ORM- Model Functions
        $product = Product::create([
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
        return $this->responseWithSuccess($product, 'Product created successfully.');
    }

    public function viewProduct($id)
    {
        $product = Product::find($id);
        return $this->responseWithSuccess($product, 'Single product view.');
    }

    public function deleteProduct($id)
    {
        //find() , findOrFail()
        $product = Product::find($id);
        if ($product) {
            $product->delete();// delete from product where id=$id
            return $this->responseWithSuccess(null, 'Product deleted successfully.');
        }
        return $this->responseWithError('No data found.');
    }

    public function update(Request $request, $id)
    {
        $product = Product::find($id);
        if ($product) {
            $product->update([
                'name' => $request->product_name,
                'status' => $request->status,
                'price' => $request->price,
            ]);
            return $this->responseWithSuccess($product, 'Product Updated.');
        }
        return $this->responseWithError('No data found to update.');
    }
}
