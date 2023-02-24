<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;

class StatusController extends Controller
{
    public function updateStatus(Request $request)
    {
        $order = Order::find($request->order_id); 
        $order->status = $request->status; 
        $order->save(); 
        return response()->json(['success'=>'Status change successfully.']); 
    }
}
