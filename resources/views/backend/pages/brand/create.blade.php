@extends('backend.master')

@section('content')
        <h1>Create new Brand</h1>
        <form action="{{route('brand.store')}}" method="post">
            @csrf
            <div>
                <label for="">Enter Brand Name:</label>
                <input name="brand_name" type="text" class="form-control" placeholder="Enter Brand Name">
            </div>

            <div>
                <label for="">Enter description</label>
                <textarea  class="form-control" name="brand_description" id="" cols="" rows="" placeholder="Enter Description"></textarea>
            </div>

            <div>
                <label for="">Select Option</label>
                <select name="brand_status" id="" class="form-control">
                    <option value="active">Active</option>
                    <option value="inactive">Inactive</option>
                </select>
            </div>

            <div>
                <label for="">Upload Brand Image</label>
                <input type="file" class="form-control">
            </div>

            <button type="submit" class="btn btn-primary"> Create</button>

        </form>

@endsection
