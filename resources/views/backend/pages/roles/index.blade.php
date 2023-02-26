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
                    <a href="{{route('roles.edit',$data->id)}}" class="btn btn-outline-success">Edit</a>
                    <!-- <a href="" class="btn btn-outline-primary">Update</a> -->
                    <form action="{{route('roles.destroy',$data->id)}}" method="post">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-outline-danger">Delete</button>
                    </form>

                    <a href="{{route('roles.show',$data->id)}}" class="btn btn-outline-success">View</a>
                    <a href="{{route('role.assign')}}" class="btn btn-outline-primary">Assign</a>

                </td>
            </tr>
        @endforeach
        </tbody>
    </table>


@endsection
