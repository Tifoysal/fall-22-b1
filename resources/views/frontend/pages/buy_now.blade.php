@extends('frontend.master')

@section('content')


    <div class="container">
        <h1>You are buying product: </h1>
        <h1>Price: BDT</h1>
        <hr>
        <div class="row">
            <div class="col-md-4 order-md-2 mb-4">
                <h4 class="d-flex justify-content-between align-items-center mb-3">
                    <span class="text-muted">Your cart</span>
                    <span class="badge badge-secondary badge-pill">{{count(session()->get('cart'))}}</span>
                </h4>
                <ul class="list-group mb-3">

                    @foreach(session()->get('cart') as $data)

                    <li class="list-group-item d-flex justify-content-between lh-condensed">
                        <div>
                            <h6 class="my-0">{{$data['name']}}</h6>
                            <small class="text-muted">{{$data['quantity']}}</small>
                        </div>
                        <span class="text-muted">{{$data['subtotal']}}</span>
                    </li>
                    @endforeach

                    <li class="list-group-item d-flex justify-content-between">
                        <span>Total (BDT)</span>
                        <strong>{{array_sum(array_column(session()->get('cart'),'subtotal'))}}</strong>
                    </li>
                </ul>


            </div>
            <div class="col-md-8 order-md-1">
                <h4 class="mb-3">Billing address</h4>

                <form action="{{route('pay')}}" class="needs-validation" novalidate method="post">
                    @csrf
                    <input type="hidden" name="total" value="{{array_sum(array_column(session()->get('cart'),'subtotal'))}}">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="firstName">First name</label>
                            <input name="first_name"  type="text" class="form-control" id="firstName" placeholder="" value="{{auth()->user()->name}}" required>
                            <div class="invalid-feedback">
                                Valid first name is required.
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="lastName">Last name</label>
                            <input name="last_name" type="text" class="form-control" id="lastName" placeholder="" value="" required>
                            <div class="invalid-feedback">
                                Valid last name is required.
                            </div>
                        </div>
                    </div>



                    <div class="mb-3">
                        <label for="email">Email <span class="text-muted">(Optional)</span></label>
                        <input name="email" value="{{auth()->user()->email}}" type="email" class="form-control" id="email" placeholder="you@example.com">
                        <div class="invalid-feedback">
                            Please enter a valid email address for shipping updates.
                        </div>
                    </div>


                    <button class="btn btn-primary btn-lg btn-block" type="submit">Pay Now</button>
                </form>
            </div>
        </div>


@endsection
