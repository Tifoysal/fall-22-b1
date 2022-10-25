@extends('backend.master')


@section('content')

    <form>

        <div class="form-group">
            <label for="name">Enter Category Name</label>
            <input type="text" class="form-control" id="name" placeholder="Enter Category Name">
        </div>

        <div class="form-group">
            <label for="name">Description</label>
            <textarea class="form-control" name="" id=""></textarea>
        </div>

        <div class="form-group">
            <label for="">Enter Category Name</label>
            <select name="" id="" class="form-control">
                <option value="">Active</option>
                <option value="">Inactive</option>
            </select>
        </div>

        <div class="form-group">
            <label for="image">Upload Image</label>
            <input type="file" class="form-control" id="image">
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>


@endsection
