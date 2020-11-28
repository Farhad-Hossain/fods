<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\ExtraFood;
use App\Models\Food;
use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use App\Models\Transaction;
use App\Models\DiscountCoupon;

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

            $foodPromocodes = Food::promocodes($food->id);
            // $restaurantPromoocdes = Restaurant::promocodes($food->restaurant);

            Cart::add([
                'id' => $food->id,
                'name' => $food->food_name,
                'qty' => $request->food_quantity,
                'price' => $food->price,
                'options'=> [
                    'food_info'=>$food, 'restaurant_info'=>$food->restaurant, 'promocodes'=>$foodPromocodes,
                ]
            ]);

            if (is_array($request->extra_food)) {
                if (count($request->extra_food) > 0) {
                    foreach ($request->extra_food as $extra_food) {
                        $extra_food = ExtraFood::where('id', $extra_food)
                            ->where('status', 1)
                            ->first();
                        if (!empty($extra_food)) {
                            Cart::instance('extra_food')->add([
                                'id' => $extra_food->id,
                                'name' => $extra_food->name,
                                'qty' => 1,
                                'price' => $extra_food->price
                            ]);
                        }
                    }
                }
            }

        } catch (\Exception $e) {
            return response()->json(['message' => 'Something went wrong'.$e->getMessage()], 500);
        };

        return response()->json(['message' => 'Successfully added this food'], 200);
    }

    public function getCartContent()
    {
        $contents = Cart::content();
        $extra_contents = Cart::instance('extra_food')->content();
        
        return view('frontend.partials._top_mini_cart_content', compact('contents', 'extra_contents'));
    }

    public function removeCartContent(Request $request)
    {
        if ($request->extra == true) {
            $cart_data = Cart::instance('extra_food')->content()->where('id', $request->id)->first();
            Cart::instance('extra_food')->remove($cart_data->rowId);
            return response()->json([
                'message' => 'Remove Success',
                'status' => 200
            ]);
        } else {
            $cart_data = Cart::content()->where('id', $request->id)->first();
            Cart::remove($cart_data->rowId);
            return response()->json([
                'message' => 'Remove Success',
                'status' => 200
            ]);
        }

    }


    public function showCheckoutPage()
    {
        $cart_contents      = Cart::content();
        $extra_contents     = Cart::instance('extra_food')->content();

        // dd( $cart_contents );

        $delivery_charge    = Food::getTotalDeliveryChargeFromCart($cart_contents);

        
        return view('frontend.pages.checkout', compact('cart_contents', 'extra_contents', 'delivery_charge'));
    }

    public function submitOrder(Request $request)
    {
        DB::beginTransaction();
        try {
            $cart_contents = Cart::content();
            $subtotal = Cart::subtotal();
            $subtotal = str_replace(',', '', $subtotal);

            $extra_contents = Cart::instance('extra_food')->content();
            $extra_subtotal = Cart::instance('extra_food')->subtotal();
            $extra_subtotal = str_replace(',', '', $extra_subtotal);


            if ($cart_contents->count() > 0) {
                $delivery_charge = Food::getTotalDeliveryChargeFromCart($cart_contents);

                $total_discount = 0;

                $subtotal += $delivery_charge + $extra_subtotal;
                $payable_amount = $subtotal - $total_discount;

                $order = new Order();
                $order->user_id = Auth::id();
                $order->sub_total = $subtotal;
                $order->total_discount = $total_discount;
                $order->payable_amount = $payable_amount;
                $order->delivery_address = $request->delivery_address;
                $order->paid_amount = 0;
                $order->order_status = 1;//1=pending
                $order->payment_status = 0;//0=pending
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
                    $order_details->food_type = 1;//1=food
                    $order_details->restaurant_id = $food->restaurant_id;
                    $order_details->food_id = $food->id;
                    $order_details->quantity = $content->qty;
                    $order_details->price = $content->price;
                    $order_details->discount = $discount;
                    $order_details->payable_amount = $pay_amount;
                    
                    $order_details->status = 1;
                    $order_details->save();
                }
                foreach ($extra_contents as $content) {
                    $extra_food = ExtraFood::where('id', $content->id)
                        ->where('status', 1)
                        ->first();

                    $discount = 0;
                    $pay_amount = $content->price - $discount;

                    $order_details = new OrderDetail();

                    $order_details->order_id = $order->id;
                    $order_details->user_id = Auth::id();
                    $order_details->food_type = 2;//2=extra food
                    $order_details->restaurant_id = $extra_food->restaurant_id;
                    $order_details->food_id = $extra_food->id;
                    $order_details->quantity = $content->qty;
                    $order_details->price = $content->price;
                    $order_details->discount = $discount;
                    $order_details->payable_amount = $pay_amount;

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

    public function getAvailablePromoCode(Request $request)
    {
        $today = date('y-m-d');
        $promocode = DiscountCoupon::where('promo_code',$request->promocode)
                    ->whereColumn('selling_count', '<', 'promo_code_limit')
                    ->where('minimum_eligible_amount', '<', $request->subTotalBill)
                    ->where('status', '=', 1)
                    ->get();
        if ( $promocode->count() < 1 ) {
            return 'not_found';
        }
        return response()->json([
            'promocode'=>$promocode
        ]);
    }
}
