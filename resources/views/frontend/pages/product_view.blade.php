@extends('frontend.master')

@section('content')

    <style type="text/css">
        body {
            background-color: rgb(245, 245, 245)
        }

        .card .top-design {
            width: 268px;
            transform: rotate(-38deg);
            position: relative;
            top: -45px;
            left: -49px;
            background: rgba(255, 0, 255, 0.2);
            height: 101px;
            border-top: 26px solid rgba(175, 2, 175, 0.2);
            border-bottom: 17px solid rgba(114, 0, 114, 0.2);
            margin-left: -30px;
            margin-right: -75px
        }

        .card {
            overflow: hidden;
            width: 500px;
            height: 500px;
            border-radius: 20px;
            box-shadow: 0 3px 10px 0 rgba(0, 0, 0, 0.1), 0 5px 10px 0 rgba(0, 0, 0, 0.1)
        }

        .card .bottom-design {
            width: 224px;
            transform: rotate(-38deg);
            position: relative;
            bottom: -42px;
            right: -278px;
            background: rgba(255, 1, 255, 0.2);
            border-top: 21px solid rgba(175, 2, 175, 0.2);
            border-bottom: 40px solid rgba(114, 0, 114, 0.2);
            margin-left: 50px;
            height: 109px
        }

        .avatar {
            border-radius: 100%;
            width: 100px;
            height: 100px
        }

        .bg-b {
            margin-bottom: 10px;
            background: rgb(240, 240, 240);
            height: 4px;
            position: relative;
            top: -60%;
            right: -20px
        }

        .bg-t {
            align-items: center;
            align-content: center;
            flex-direction: column;
            justify-content: center;
            display: flex;
            width: 60%;
            position: relative;
            top: -43%;
            background: rgb(240, 240, 240);
            left: 46%
        }

        .link-b .btn {
            margin-left: 10px;
            margin-bottom: 3px
        }

        .addBtn {
            display: inline-block;
            width: 100%;
            height: calc(1.5em + 0.75rem + 12px);
            padding: 0.375rem 0.75rem;
            font-size: 1rem;
            font-weight: 400;
            line-height: 1.5;
            color: rgb(77, 77, 77);
            background-clip: padding-box;
            border: 1px solid #ced4da;
            border-radius: 0.35rem;
            border-color: transparent;
            background-color: transparent;
            box-shadow: 0 3px 5px 0 rgba(0, 0, 0, 0.344), 0 3px 5px 0 rgba(0, 0, 0, 0.261);
            transition: all 0.4s ease-in-out
        }

        .addBtn:focus {
            box-shadow: 0 4px 5px 0 rgba(0, 0, 0, 0.344), 0 3px 5px 0 rgba(0, 0, 0, 0.261)
        }

        .addBtn:hover {
            border-color: rgba(199, 0, 199, 0.4);
            background-color: rgba(196, 0, 196, 0.4);
            color: white
        }

        .addBtn:focus {
            border-color: rgb(199, 0, 199);
            background-color: rgb(196, 0, 196);
            color: white
        }

        .link-b .h4 {
            margin: 0
        }

        .user-info {
            position: relative;
            top: 20px
        }
    </style>
    <h1>Single Product View</h1>

    <div class="container pt-5">
        <div class="row justify-content-center">
            <div class="card">
                <div class="top-design"></div>
                <div class="card-body"><img
                    src="{{url('/uploads/'.$product->image)}}" alt="" class="avatar">
                    <div class="user-info">
                        <h3>{{$product->name}}</h3> <span class="text-muted">
                            {{$product->description}}
                        </span>
                    </div>
                    <div class="bg-t">
                        <ul class="nav text-center">
                            <li class="nav-item h4"><a href="#" class="nav-link text-dark"><i class="fa fa-rss "></i>
                                   {{$product->price}} .BDT</a></li>
                        </ul>
                        <div class="link-b"><a class="btn btn-primary btn-twitter btn-sm" href="#"> <i
                                    class="fa fa-twitter"></i> </a> <a class="btn btn-danger btn-sm" rel="publisher"
                                                                       href="#"> <i class="fa fa-instagram"></i> </a> <a
                                class="btn btn-primary btn-sm" rel="publisher" href="#"> <i class="fa fa-facebook"></i>
                            </a></div>
                    </div>
                    <div class="input-group mb-3 w-75 mx-auto">
                        <a  href="{{route('buy.form',$product->id)}}" class="btn addBtn form-control" aria-describedby="myBtn">Buy Now</a>
                    </div>
                    <div class="bg-b"></div>
                </div>
                <div class="bottom-design"></div>
            </div>
        </div>
    </div>
@endsection
