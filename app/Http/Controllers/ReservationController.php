<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReservationController extends Controller
{
    // Reserve food
    public function reserve(FoodPost $food)
    {
        // Only if food is still available
        if ($food->status !== 'Available') {
            return back();
        }

        $food->update([
            'status' => 'Reserved',
            'reserved_by' => Auth::id(),
        ]);

        return back();
    }

    // Claim food
    public function claim(FoodPost $food)
    {
        // Only the student who reserved can claim
        if ($food->reserved_by === Auth::id()) {
            $food->update([
                'status' => 'Finished',
            ]);
        }

        return back();
    }
}
