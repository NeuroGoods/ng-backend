<?php

namespace App\Http\Controllers\Api;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class categoryController extends Controller
{
   
    public function index()
    {
        $category = Category::all();
        return response()->json($category);
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

        $category = Category::create($validatedData);
        return response()->json($product, 201);
    }

   
    public function show(string $id)
    {
        $category = Category::find($id);
        return response()->json($product);
    }

    
    public function edit(string $id)
    {
        
    }

 
     
    public function update(Request $request, string $id)
    {
        $product = Category::find($id);

        if (!$category) {
            return response()->json(['message' => 'category not found'], 404);
        }

        $validated = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required',
            'category_id' => 'required',
        ]);

        $category->update(array_filter($validated));
        return response()->json($category, 200);
    }

    
    public function destroy(string $id)
    {
        $category = Category::find($id);

        if (!$category) {
            return response()->json(['message' => 'Category not found'], 404);
        }

        $category->delete();
        return response()->json(['message' => 'category deleted'], 200);
    }
}
