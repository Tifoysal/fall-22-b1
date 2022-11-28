@extends('frontend.master')

@section('content')

    <div class="container mt-100">




        <div class="row">
            @if($searchResult->count()>0)
                @foreach($searchResult as $product)
                <div class="col-md-4 col-sm-6">
                    <div class="card mb-30">
                        <a class="card-img-tiles" href="#" data-abc="true">
                            <div class="inner">
                                <div class="main-img">
                                    <img src="https://i.imgur.com/O0GMYuw.jpg" alt="Category">
                                </div>

                            </div>
                        </a>
                        <div class="card-body text-center">
                            <h4 class="card-title">{{$product->name}}</h4>
                            <p class="text-muted">Price:  {{$product->price}}</p><a class="btn btn-outline-primary btn-sm" href="#" data-abc="true">View Products</a>
                        </div>
                    </div>
                </div>
                @endforeach
            @else
                <p class="alert alert-danger">No Product Found.</p>
            @endif
        </div>
    </div>

@endsection
