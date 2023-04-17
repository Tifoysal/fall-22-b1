@extends('frontend.master')
@section('content')
    <section class="h-100" style="background-color: #eee;">
        <div class="container h-100 py-5">
            <div class="row d-flex justify-content-center align-items-center h-100">
                @if(session()->has('cart') and count(session()->get('cart'))>0)
                <div class="col-10">

                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h3 class="fw-normal mb-0 text-black">Shopping Cart</h3>
                        <div>
                            <a href="{{route('cart.clear')}}" class="btn btn-danger ">Clear Cart</a>
                        </div>
                    </div>

                        @foreach(session()->get('cart') as $key=>$data)

                    <div class="card rounded-3 mb-4">
                        <div class="card-body p-4">
                            <div class="row d-flex justify-content-between align-items-center">
                                <div class="col-md-2 col-lg-2 col-xl-2">
                                    <img
                                        src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-shopping-carts/img1.webp"
                                        class="img-fluid rounded-3" alt="Cotton T-shirt">
                                </div>
                                <div class="col-md-3 col-lg-3 col-xl-3">
                                    <p class="lead fw-normal mb-2">{{$data['name']}}</p>

                                </div>
                                <div class="col-md-3 col-lg-3 col-xl-2 d-flex">
                                    <button class="btn btn-link px-2"
                                            onclick="this.parentNode.querySelector('input[type=number]').stepDown()">
                                        <i class="fas fa-minus"></i>
                                    </button>

                                    <input id="form1" min="0" name="quantity" value="{{$data['quantity']}}" type="number"
                                           class="form-control form-control-sm" />

                                    <button class="btn btn-link px-2"
                                            onclick="this.parentNode.querySelector('input[type=number]').stepUp()">
                                        <i class="fas fa-plus"></i>
                                    </button>
                                </div>
                                <div class="col-md-3 col-lg-2 col-xl-2 offset-lg-1">
                                    <h5 class="mb-0">{{$data['price']}} BDT</h5>
                                    <span class="mb-0">  {{$data['subtotal']}} BDT</span>
                                </div>

                                <div class="col-md-1 col-lg-1 col-xl-1 text-end">
                                    <a href="{{route('cart.item.delete',$key)}}" class="text-danger"><i class="fas fa-trash fa-lg"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                        @endforeach

                    <div class="card">
                        <div class="card-body">

                            <a href="{{route('cart.checkout')}}" class="btn btn-warning btn-block btn-lg">Proceed to Pay</a>
                        </div>
                    </div>

                </div>
                @else

                    <h3>Your cart is empty.. :) </h3>

                    @endif
            </div>
        </div>
    </section>
@endsection
