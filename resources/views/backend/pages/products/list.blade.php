@extends('backend.master')

@section('content')

    <h1>Product List</h1>

    @if(session()->has('message'))
        <p class="alert alert-success">{{session()->get('message')}}</p>
      @endif

    @if(session()->has('error'))
        <p class="alert alert-danger">{{session()->get('error')}}</p>
    @endif

    <a href="{{route('product.create')}}" class="btn btn-primary" >Create New Product</a>

    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Image</th>
            <th scope="col">Name</th>
            <th scope="col">Price</th>
            <th scope="col">Category Name</th>
            <th scope="col">Status</th>
            <th scope="col">Stock</th>
            <th scope="col">Action</th>
        </tr>
        </thead>
        <tbody>

        @foreach($products  as $data)
        <tr>
            <th scope="row">{{$data->id}}</th>
            <td>

                <img width="100px" style="border-radius: 10px" src="{{url('/uploads/'.$data->image)}}" alt="product_image">
            </td>
            <td>{{$data->name}}</td>
            <td>{{$data->price}} BDT</td>
            <td>{{$data->category->name}}</td>
            <td>{{$data->status}}</td>
            <td>{{$data->stock}}</td>
            <td>
                <a href="{{route('admin.product.view',$data->id)}}" class="btn btn-primary">View</a>
                <a href="" class="btn btn-info">Edit</a>
                <a href="{{route('admin.product.delete',$data->id)}}" class="btn btn-danger">Delete</a>
            </td>
        </tr>
        @endforeach

        </tbody>
    </table>
@endsection
