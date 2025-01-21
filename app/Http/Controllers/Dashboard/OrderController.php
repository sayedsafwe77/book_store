<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\User;
use App\Models\Order;
use App\Models\ShippingArea;
use Illuminate\Http\Request;
use App\Http\Requests\OrderRequest;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orders = Order::filter(request()->all())->orderBy('id','DESC')->paginate();
        $getData['shipping_areas'] = ShippingArea::get();
        $getData['users']  = User::get();
        return view('dashboard.order.index', compact('orders','getData'));
    }

    /**
     * Show the form for creating a new resource.
     */
    function create()
    {
        $getData['shipping_areas'] = ShippingArea::get();
        $getData['users']  = User::get();
        return view('dashboard.order.create', compact('getData'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(OrderRequest $request)
{
    $last_order_number = Order::orderBy('id', 'DESC')->value('number');
    $last_number = $last_order_number ? (int) substr($last_order_number, 6) : 1000; 
    $order_number = 'order-' . ($last_number + 1);  
    $order_data = $request->validated();
    $order_data['number'] = $order_number;
   Order::create($order_data);

    // Redirect with success message
    return redirect()->route('dashboard.order.index')->with('success', 'Order created successfully');
}

    
    /**
     * Display the specified resource.
     */
    function show($id)
    {
        $order = Order::find($id);
        $getData['shipping_areas'] = ShippingArea::get();
        $getData['users']  = User::get();
        return view('dashboard.order.show', compact('order', 'getData'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    function edit(Order $order)
    {
        $getData['shipping_areas'] = ShippingArea::get();
        $getData['users']  = User::get();
        return view('dashboard.order.edit', compact('order','getData'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(OrderRequest $request, Order $order)
    {
        $order->update($request->validated());
        return redirect()->route('dashboard.order.index')->with('success','Order Has Been Updeted');

    }

    /**
     * Remove the specified resource from storage.
     */
    function destroy(Order $order)  {
        $order->delete();
        return redirect()->route('dashboard.order.index')->with('success','Order Has Been Deleted');
    }

    function checkCode(Request $request)  {
        $order = Order::where('transaction_reference',$request->transaction_reference)->count();
        return response()->json(['data' => ['is_exist' => $order]]);
    }
}