@extends('backend.master')

@section('content')

    <h1>Brand List</h1>

    <a href="{{route('brand.show.form')}}" class="btn btn-primary">Create New Brand</a>


    <table class="table">
        <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Image</th>
            <th scope="col">Name</th>
            <th scope="col">Description</th>
            <th scope="col">Status</th>
            <th scope="col">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($brand_list as $data)

        <tr>
            <th scope="row">{{$data->id}}
            <td>
                <img src="{{$data->image}}" alt="Image">
            </td>
            <td>{{$data->name}}</td>
            <td>{{$data->description}}</td>
            <td>{{$data->status}}</td>
            <td>
                <a href="" class="btn btn-outline-primary">Update</a>
                <a href="" class="btn btn-outline-danger">Delete</a>
                <a href="" class="btn btn-outline-success">View</a>
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>


@endsection
