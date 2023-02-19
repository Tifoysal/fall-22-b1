@extends('backend.master')

@section('content')
        <h1>Create new Role</h1>
        <form action="{{route('roles.store')}}" method="post">
            @csrf
            <div>
                <label for="">Enter Role Name:</label>
                <input name="role_name" type="text" class="form-control" placeholder="Enter Role Name">
            </div>

            <button type="submit" class="btn btn-primary"> Create</button>

        </form>

@endsection
