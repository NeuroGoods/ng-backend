<?php

namespace App\Http\Controllers\Api;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
   
    public function index()
    {
        $order = Order::all();
        return response()->json($order);
    }

    
    public function create()
    {
        
    }

 
     
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'user_id' => 'required',
            'total' => 'required',
            'status' => 'required',
        ]);

        $order = Order::create($validatedData);
        return response()->json($order, 201);
    }

   
    public function show(string $id)
    {
        $order = Order::find($id);
        return response()->json($order);
    }

    
    public function edit(string $id)
    {
        
    }

 
     
    public function update(Request $request, string $id)
    {
        $order = Order::find($id);

        if (!$order) {
            return response()->json(['message' => 'Order not found'], 404);
        }

        $validated = $request->validate([
            'user_id' => 'required',
            'total' => 'required',
            'status' => 'required',
        ]);

        $order->update(array_filter($validated));
        return response()->json($order, 200);
    }

    
    public function destroy(string $id)
    {
        $order = Order::find($id);

        if (!$order) {
            return response()->json(['message' => 'Order not found'], 404);
        }

        $order->delete();
        return response()->json(['message' => 'Order deleted'], 200);
    }
}
