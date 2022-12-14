<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class OrderController extends Controller
{
    public function list()
    {
        $orders=Order::all();
       return view('backend.pages.orders',compact('orders'));
    }

    public function report()
    {
        return view('backend.pages.report.orders');
    }

    public function reportSearch(Request $request)
    {
//        $request->validate([
//            'from_date'    => 'required|date',
//            'to_date'      => 'required|date|after:from_date',
//        ]);

        $validator = Validator::make($request->all(), [
            'from_date'    => 'required|date',
            'to_date'      => 'required|date|after:from_date',
        ]);

        if($validator->fails())
        {
//            notify()->error($validator->getMessageBag());
            notify()->error('From date and to date required and to should greater then from date.');
            return redirect()->back();
        }



       $from=$request->from_date;
       $to=$request->to_date;


//       $status=$request->status;

        $orders=Order::whereBetween('created_at', [$from, $to])->get();
        return view('backend.pages.report.orders',compact('orders'));

    }
}
