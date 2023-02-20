@extends('backend.master')
@section('content')
<form action="{{route('roles.update',$role->id)}}" method="post">
    @method('PUT')
    @csrf
    <div>
        <label for="">Enter Role Name:</label>
        <input name="role_name" type="text" class="form-control" placeholder="Enter Role Name" value="{{$role->name}}">
    </div>
    <div class="form-group">
            <label for="">Role Status</label>
            <select name="role_status" id="" class="form-control">
                <option value="active">Active</option>
                <option value="inactive">Inactive</option>
            </select>
        </div>


    <button type="submit" class="btn btn-primary">Update</button>
</form>

@endsection