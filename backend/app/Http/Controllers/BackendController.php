<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;


class BackendController extends Controller
{
    public function index()
    {
        $order = Order::where('status', 1)->get();
        return view('order.done_order', compact('order'))
            ->with((request()->input('page', 1) - 1) * 5);
    }
    public function cancel()
    {
        $order = Order::where('status', 2)->get();
        return view('order.cancel_order', compact('order'))
            ->with((request()->input('page', 1) - 1) * 5);
    }
  
}
