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
                'qty' => $request->food_quantity,
                'price' => $food->price
            ]);

        } catch (\Exception $e) {
            return response()->json(['message' => 'Something went wrong'.$e->getMessage()], 500);
        };

        return response()->json(['message' => 'Successfully added this food'], 200);
    }

    public function getCartContent()
    {
        $contents = Cart::content();

        return view('frontend.partials._top_mini_cart_content', compact('contents'));
    }

    public function removeCartContent(Request $request)
    {
        $cart_data = Cart::content()->where('id', $request->id)->first();
        Cart::remove($cart_data->rowId);
        return response()->json([
            'message' => 'Remove Success',
            'status' => 200
        ]);
    }


    public function showCheckoutPage()
    {
        $cart_contents = Cart::content();

        return view('frontend.pages.checkout', compact('cart_contents'));
    }
}
