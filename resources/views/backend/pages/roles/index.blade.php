@extends('backend.master')

@section('content')

    <h1>Roles List</h1>

    <a href="{{route('roles.create')}}" class="btn btn-primary">Create New Role</a>


    <table class="table">
        <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Name</th>
            <th scope="col">Status</th>
            <th scope="col">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($roles as $data)

            <tr>
                <th scope="row">{{$data->id}}

                <td>{{$data->name}}</td>

                <td>{{$data->status}}</td>
                <td>
                    <a href="" class="btn btn-outline-primary">Update</a>
                    <a href="{{route('roles.destroy',$data->id)}}" class="btn btn-outline-danger">Delete</a>
                    <a href="{{route('roles.show',$data->id)}}" class="btn btn-outline-success">View</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>


@endsection
