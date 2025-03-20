<?php

namespace App\Http\Controllers\Api;

use App\Models\product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
   
    public function index()
    {
        $products = product::all();
        return response()->json($products);
    }

    
    public function create()
    {
        
    }

 
     
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required',
            'stock' => 'required',
            'image' => 'required',
            'category_id' => 'required',
        ]);

        $product = product::create($validatedData);
        return response()->json($product, 201);
    }

   
    public function show(string $id)
    {
        $product = product::find($id);
        return response()->json($product);
    }

    
    public function edit(string $id)
    {
        
    }

 
     
    public function update(Request $request, string $id)
    {
        $product = product::find($id);

        if (!$product) {
            return response()->json(['message' => 'Product not found'], 404);
        }

        $validated = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required',
            'category_id' => 'required',
        ]);

        $product->update(array_filter($validated));
        return response()->json($product, 200);
    }

    
    public function destroy(string $id)
    {
        $product = product::find($id);

        if (!$product) {
            return response()->json(['message' => 'Product not found'], 404);
        }

        $product->delete();
        return response()->json(['message' => 'Product deleted'], 200);
    }
}
