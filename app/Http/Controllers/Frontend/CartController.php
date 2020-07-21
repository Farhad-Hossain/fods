<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Food;
use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use App\Models\Transaction;

use Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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

    public function submitOrder()
    {
        DB::beginTransaction();
        try {
            $cart_contents = Cart::content();

            if ($cart_contents->count() > 0) {

                $total_discount = 0;
                $delivery_charge = 50;

                $subtotal = Cart::subtotal();
                $subtotal = str_replace(',', '', $subtotal);
                $subtotal += $delivery_charge;
                $payable_amount = $subtotal - $total_discount;

                $order = new Order();
                $order->user_id = Auth::id();
                $order->sub_total = $subtotal;
                $order->total_discount = $total_discount;
                $order->payable_amount = $payable_amount;
                $order->paid_amount = 0;
                $order->payment_status = 1;//0=pending
                $order->save();


                $order_unique_id = Order::getNewOrderId($order->id);
                $order->order_id = $order_unique_id;
                $order->save();

                foreach ($cart_contents as $content) {
                    $food = Food::where('id', $content->id)
                        ->where('status', 1)
                        ->first();

                    $discount = 0;
                    $pay_amount = $content->price - $discount;

                    $order_details = new OrderDetail();

                    $order_details->order_id = $order->id;
                    $order_details->user_id = Auth::id();
                    $order_details->restaurant_id = $food->restaurant_id;
                    $order_details->food_id = $food->id;
                    $order_details->price = $content->price;
                    $order_details->discount = $discount;
                    $order_details->payable_amount = $pay_amount;
                    $order_details->delivery_address = 'Demo Address';
                    
                    $order_details->status = 1;
                    $order_details->save();
                }
            } else {
                session()->flash('type', 'warning');
                session()->flash('message', 'Cart is Empty');
                return redirect()->back();
            }


        } catch (\Exception $e) {
            DB::rollBack();
            session()->flash('type', 'danger');
            session()->flash('message', 'Something went wrong.'.$e->getMessage());
            return redirect()->back();
        }
        DB::commit();

        session()->flash('type', 'success');
        session()->flash('message', 'Order Placed.');
        return redirect()->route('frontend.cart.payment', $order->id);
    }


    public function showPaymentOptionPage($order_id)
    {
        try {

            $order = Order::where('id', $order_id)->first();
            return view('frontend.pages.payment-options', compact('order'));

        } catch (\Exception $e) {
            return "Something went wrong.";
        }
    }
}
