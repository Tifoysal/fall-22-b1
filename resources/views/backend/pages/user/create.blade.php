@extends('backend.master')

@section('content')

    <h1>{{$title}}</h1>
    <h5>{{$subtitle}}</h5>

    <form action="{{route('user.store')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div>
            <label for="">Enter first Name: </label>
            <input name="first_name" type="text" class="form-control">
        </div>

        <div>
            <label for="">Enter Last Name: </label>
            <input name="last_name" type="text" class="form-control">
        </div>

        <div>
            <label for="">Select User Role: </label>
            <select class="form-control" name="role_id" id="">
                @foreach($roles as $role)
                <option value="{{$role->id}}">{{$role->name}}</option>
                    @endforeach
            </select>
        </div>

        <div>
            <label for="">Enter Email: </label>
            <input name="email" type="email" class="form-control">
        </div>


        <div>
            <label for="">Enter User Password: </label>
            <input name="password" type="password" class="form-control">
        </div>

        <div>
            <label for="">Enter User Mobile: </label>
            <input required name="mobile" type="text" class="form-control">
        </div>

        <div>
            <label for="">Upload User Image: </label>
            <input name="image" type="file" class="form-control">
        </div>



        <div>
            <button class="btn btn-primary">Submit</button>
        </div>

    </form>


@endsection
