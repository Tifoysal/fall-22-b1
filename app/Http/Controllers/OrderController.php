<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function list()
    {
        $orders=Order::all();
       return view('backend.pages.orders',compact('orders'));
    }
}
