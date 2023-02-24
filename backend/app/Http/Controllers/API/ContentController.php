<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Order;
use App\Http\Controllers\Controller;


class ContentController extends Controller
{
    public function home()
    {
        // $orders = Order::all();
        // return response()->json([
        //     'status'=>200,
        //     'orders'=>$orders
        // ])
        return (Order::all());
        // $order = Order::where('status',0)->get();
        // return view('order.index',compact('order'))
        //     ->with( (request()->input('page', 1) - 1) * 5);
    }
}
