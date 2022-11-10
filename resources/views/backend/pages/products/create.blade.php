@extends('backend.master')

@section('content')


    <form action="{{route('product.store')}}" method="post" enctype="multipart/form-data">

        @if($errors->any())
            @foreach($errors->all() as $message)
                <p class="alert alert-danger">{{$message}}</p>
            @endforeach
        @endif

            @if(session()->has('message'))
                <p class="alert alert-success">{{session()->get('message')}}</p>
            @endif

        @csrf
        <div class="form-group">
            <label for="name">Enter Product Name</label>
            <input required name="product_name" type="text" class="form-control" id="name" placeholder="Enter Product Name">
        </div>

            <div class="form-group">
                <label for="price">Enter Product Price</label>
                <input required name="product_price" type="number" class="form-control" id="price" placeholder="Enter Product Price">
            </div>
            <div class="form-group">
                <label for="stock">Enter Product Stock</label>
                <input required name="product_stock" type="number" class="form-control" id="price" placeholder="Enter Product Stock">
            </div>

            <div class="form-group">
            <label for="name">Description</label>
            <textarea class="form-control" name="description" id=""></textarea>
        </div>

        <div class="form-group">
            <label for="">Select Status</label>
            <select name="status" id="" class="form-control">
                <option value="active">Active</option>
                <option value="inactive">Inactive</option>
            </select>
        </div>

            <div class="form-group">
                <label for="">Select Category</label>
                <select name="category_id" id="" class="form-control">
                    @foreach($categories  as $cat)
                    <option value="{{$cat->id}}">{{$cat->name}}</option>
                    @endforeach
                </select>
            </div>

        <div class="form-group">
            <label for="image">Upload Image</label>
            <input name="image" type="file" class="form-control" id="image">
        </div>



        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
