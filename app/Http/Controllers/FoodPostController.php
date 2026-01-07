<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FoodPostController extends Controller
{
    // 1️⃣ Show all food posts
    public function index()
    {
        $foods = FoodPost::latest()->get();
        return view('food.index', compact('foods'));
    }

    // 2️⃣ Show create form
    public function create()
    {
        return view('food.create');
    }

    // 3️⃣ Store new food post
    public function store(Request $request)
    {
        $request->validate([
            'food_name' => 'required',
            'location' => 'required',
            'quantity' => 'required|integer',
        ]);

        FoodPost::create([
            'food_name' => $request->food_name,
            'location' => $request->location,
            'quantity' => $request->quantity,
            'user_id' => Auth::id(),
        ]);

        return redirect()->route('food.index');
    }

    // 4️⃣ Show edit form
    public function edit(FoodPost $food)
    {
        return view('food.edit', compact('food'));
    }

    // 5️⃣ Update food post
    public function update(Request $request, FoodPost $food)
    {
        $food->update($request->all());
        return redirect()->route('food.index');
    }

    // 6️⃣ Delete food post
    public function destroy(FoodPost $food)
    {
        $food->delete();
        return back();
    }
}
