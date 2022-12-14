@extends('frontend.master')
@section('content')
    <div class="container rounded bg-white mt-5 mb-5">
        <div class="row">
            <div class="col-md-4 border-right">
                <div class="d-flex flex-column align-items-center text-center p-3 py-5"><img class="rounded-circle mt-5" width="150px" src="https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg">
                    <span class="font-weight-bold">{{auth()->user()->name}}</span>
                    <span class="text-black-50">{{auth()->user()->email}}</span>

                </div>
            </div>
            <div class="col-md-8 border-right">
                <div class="p-3 py-5">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h4 class="text-right">Profile Settings</h4>
                    </div>
                    <form action="{{route('profile.update')}}" method="post">

                        @method('put')
                        @csrf
                    <div class="row mt-2">
                        <div class="col-md-12"><label class="labels">Name</label>
                            <input name="user_name" type="text" class="form-control" placeholder="Name" value="{{auth()->user()->name}}"></div>

                    </div>
                    <div class="row mt-3">
                        <div class="col-md-12"><label class="labels">Mobile Number</label><input name="user_mobile" type="text" class="form-control" placeholder="enter phone number" value="{{auth()->user()->mobile}}"></div>
                        <div class="col-md-12"><label class="labels">Address Line 1</label><input name="user_address" type="text" class="form-control" placeholder="enter address line 1" value="{{auth()->user()->address}}"></div>
                        <div class="col-md-12"><label class="labels">Email ID</label><input readonly type="text" class="form-control" placeholder="enter email id" value="{{auth()->user()->email}}"></div>
                       </div>

                    <div class="mt-5 text-center">
                        <button class="btn btn-primary profile-button" type="submit">Update Profile</button>
                    </div>
                    </form>


                </div>
            </div>

        </div>
    </div>

@endsection
