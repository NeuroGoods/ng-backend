<?php

namespace App\Http\Controllers\Api;

use App\Models\Review;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ReviewController extends Controller
{
   
    public function index()
    {
        $review = Review::all();
        return response()->json($review);
    }

    
    public function create()
    {
        
    }

 
     
    public function store(Request $request)
    {
        $validatedData = $request->validate([
         
            'user_id' => 'required',
            'product_id' => 'required',
            'comment' => 'required',
            'rating' => 'required',
            
             
        ]);

        $review = review::create($validatedData);
        return response()->json($review, 201);
    }

   
    public function show(string $id)
    {
        $review = Review::find($id);
        return response()->json($review);
    }

    
    public function edit(string $id)
    {
        
    }

 
     
    public function update(Request $request, string $id)
    {
        $review = Review::find($id);

        if (!$review) {
            return response()->json(['message' => 'review not found'], 404);
        }

        $validated = $request->validate([
            'user_id' => 'required',
            'product_id' => 'required',
            'comment' => 'required',
            'rating' => 'required',
            
        ]);

        $review->update(array_filter($validated));
        return response()->json($review, 200);
    }

    
    public function destroy(string $id)
    {
        $review = Review::find($id);

        if (!$review) {
            return response()->json(['message' => 'Review not found'], 404);
        }

        $review->delete();
        return response()->json(['message' => 'Review deleted'], 200);
    }
}
