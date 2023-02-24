<?php

namespace App\Http\Controllers;

use App\Order;
use Illuminate\Http\Request;


class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return response()->json(Order::where('status',1)->get());
        $order = Order::all();
        return view('order.index', compact('order'))
            ->with((request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('order.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //     $request->validate([
        //         'name' => 'required',
        //         'status' => 'required',
        //         'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        //         'description' => 'required',
        //         'design_code' => 'required',
        //     ]);
        //     if ($files = $request->file('photo')) {
        //     $destinationPath = 'storage/image/'; // upload path
        //     $profileImage = date('YmdHis') . "." . $files->getClientOriginalExtension();
        //     // $files->move($destinationPath, $profileImage);
        //     $insert['photo'] = "$profileImage";
        //     }

        //     // if($request->hasFile('photo'))
        //     // {
        //     //     $file = $request->file('photo');
        //     //     $extension = $file->getClientOriginalExtension();
        //     //     $filename = time() .'.'.$extension;
        //     //     $file->move('uploads/photo/',$filename);
        //     //     $insert['image'] = 'uploads/photo/'.$filename;
        //     // }


        //     // $imageName = time() . '.' . $request->photo->extension();

        //     // $request->photo->move(public_path('images'), $imageName);

        //     $insert['name'] = $request->get('name');
        //     $insert['product_code'] = $request->get('product_code');
        //     $insert['description'] = $request->get('description');
        //     $insert['status'] = $request->get('status');

        //     Order::insert($request->except('_token'));
        //     return redirect()->route('order.index')
        //         ->with('success', 'New Image upload successfully');
        // 

        if ($request->hasFile("photo")) {
            $file = $request->file("photo");
            $imageName = time() . '_' . $file->getClientOriginalName();
            $file->move(\public_path("cover/"), $imageName);

            $order = new Order([
                "name" => $request->name,
                "design_code" => $request->design_code,
                "description" => $request->description,
                "status" => $request->status,

                "photo" => $imageName,
            ]);
            $order->save();
        }

        return redirect("/");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        return view('order.show', compact('order'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        return view('order.edit', compact('order'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'size' => 'required',
            'deli_fee' => 'required',
            'design_code' => 'required',
            'total_amount' => 'required',
            'location' => 'required',
        ]);

        $order->update($request->all());

        return redirect()->route('order.index')
            ->with('success', 'Order updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        $order->delete();
        return redirect()->route('order.index')
            ->with('success', 'Order deleted successfully');
    }

    //change status
    public function changeStatus($id)
    {
        $getStatus = Order::select('status')->where('id', $id)->first();
        if ($getStatus->status == 0) {
            $status = 1;
        } else {
            $status = 0;
        }
        Order::where('id', $id)->update(['status' => $status]);
        return redirect()->route('order.index')
            ->with('success', 'Order successfully.');
    }
    public function changeCancel($id)
    {
        $getStatus = Order::select('status')->where('id', $id)->first();
        if ($getStatus->status == 0) {
            $status = 2;
        } else {
            $status = 0;
        }
        Order::where('id', $id)->update(['status' => $status]);
        return redirect()->route('order.index')
            ->with('danger', 'Order Cancel.');
    }
}
