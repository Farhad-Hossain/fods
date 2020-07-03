<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Food;
use Illuminate\Http\Request;

use Cart;

class CartController extends Controller
{
    public function addToCart(Request $request)
    {
        try {

            $food = Food::where('id', $request->food_id)
                ->where('status', 1)
                ->first();
            if (empty($food)) {
                return response()->json(['message' => 'Invalid Food'], 404);
            }

            Cart::add([
                'id' => $food->id,
                'name' => $food->food_name,
                'qty' => $request->qty,
                'price' => $food->price
            ]);

        } catch (\Exception $e) {
            return response()->json(['message' => 'Something went wrong'], 500);
        };

        return response()->json(['message' => 'Successfully added this food'], 200);
    }
}
