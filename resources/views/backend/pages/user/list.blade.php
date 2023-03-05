@extends('backend.master')

@section('content')

    <h1>User List</h1>

    <a href="{{route('user.create')}}" class="btn btn-primary" >Create New User</a>

    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Full Name</th>
            <th scope="col">Role</th>
            <th scope="col">Mobile Number</th>
            <th scope="col">Action</th>
        </tr>
        </thead>
        <tbody>

        @foreach($users as $user)
        <tr>
            <th scope="row">1</th>
            <td>{{$user->full_name}}</td>
            <td>{{$user->role->name}}</td>
            <td>{{$user->mobile}}</td>
            <td>
                <a href="" class="btn btn-success">View</a>
            </td>

        </tr>
        @endforeach

        </tbody>
    </table>
@endsection
