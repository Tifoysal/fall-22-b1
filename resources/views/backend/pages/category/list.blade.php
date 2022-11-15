@extends('backend.master')

@section('content')

    <h1>Category List</h1>


        <a href="{{route('category.create')}}" class="btn btn-success">
        Create New Category
    </a>


    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Image</th>
            <th scope="col">Category Name</th>
            <th scope="col">Status</th>
            <th scope="col">Action</th>
        </tr>
        </thead>
        <tbody>


        @foreach($cats as $data)
        <tr>
            <th scope="row">{{$data->id}}</th>
            <td>
                <img src="{{$data->image}}" alt="category_image">
            </td>
            <td>{{$data->name}}</td>
            <td>{{$data->status}}</td>
            <td>
                 <a href="" class="btn btn-primary">
                   View
                </a>
                <a href="" class="btn btn-danger">Delete</a>
                <a href="" class="btn btn-warning">Edit</a>

            </td>

        </tr>
        @endforeach


        </tbody>
    </table>
    {{$cats->links()}}


@endsection
