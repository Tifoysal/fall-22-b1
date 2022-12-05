@extends('backend.master')

@section('content')
<h1>Order List</h1>
    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">First</th>
            <th scope="col">Last</th>
            <th scope="col">Handle</th>
        </tr>
        </thead>
        <tbody>

        @foreach($orders as $order)
        <tr>
            <th scope="row">1</th>
            <td>{{$order->receiver_name}}</td>
            <td>{{$order->product_id}}</td>
            <td>
                <a class="btn btn-success" href="">Accept</a>
                <a class="btn btn-danger" href="">Reject</a>

            </td>
        </tr>
        @endforeach
        </tbody>
    </table>

@endsection
