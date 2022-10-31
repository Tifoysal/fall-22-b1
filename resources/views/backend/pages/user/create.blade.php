@extends('backend.master')

@section('content')

    <h1>{{$title}}</h1>
    <h5>{{$subtitle}}</h5>

    <form action="">
        <div>
            <label for="">Enter User Name: </label>
            <input type="text" class="form-control">
        </div>


        <div>
            <label for="">Enter User Password: </label>
            <input type="password" class="form-control">
        </div>

        <div>
            <label for="">Upload User Image: </label>
            <input type="file" class="form-control">
        </div>

        <div>
            <label for="">Select Your Date of Birth: </label>
            <input type="date" class="form-control">
        </div>

        <div>
            <button class="btn btn-primary">Submit</button>
        </div>

    </form>


@endsection
