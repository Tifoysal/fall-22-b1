@extends('backend.master')

@section('content')
    <div>
        <h1 style="text-align:center; margin:20px;font-weight:bold; font-size: 30px;">Create New Permission</h1>

        <form action="{{route('permissions.assign',$role->id)}}" method="post">
            @csrf
            @php
                $permission_ids=$role->permissions->pluck('permission_id')->toArray();
            @endphp
            <p style="font-weight:bold;">{{$role->name}}</p>
            @foreach($permissions as $permission)

                <div class="form-check">
                    <input @if(in_array($permission->id,$permission_ids)) checked @endif class="form-check-input" name="permission[]" type="checkbox" value="{{$permission->id}}" id="defaultCheck1">
                    <label for="">{{$permission->name}}</label>
                </div>

            @endforeach

            <button type="submit" class="btn btn-success">Assign Permissions</button>
        </form>
@endsection
