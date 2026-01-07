<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        return view('admin.dashboard', [
            'users' => User::count(),
            'foods' => FoodPost::count(),
            'available' => FoodPost::where('status','Available')->count(),
        ]);
    }

    public function foodList()
    {
        $foods = FoodPost::latest()->get();
        return view('admin.foods', compact('foods'));
    }

    public function deleteFood(FoodPost $food)
    {
        $food->delete();
        return back();
    }
}
