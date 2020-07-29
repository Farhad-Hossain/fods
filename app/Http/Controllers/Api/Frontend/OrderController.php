<?php

namespace App\Http\Controllers\Api\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Food;
use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class OrderController extends Controller
{
    public function submitOrder(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'abc' => 'nullable'
        ]);
        if ($validator->fails()) {
            $error = $validator->messages();
            return response()->json($error, 400);
        }

        DB::beginTransaction();
        try {

            $cart_contents = $request->foods;
            $subtotal = Food::getSubTotalFromRequestedFoods($cart_contents);

            $extra_contents = $request->extra_foods;
            $extra_subtotal = Food::getSubTotalFromRequestedFoods($cart_contents);


            if (count($cart_contents) > 0) {
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

                if (is_array($cart_contents)) {
                    foreach ($cart_contents as $content) {
                        $food = Food::where('id', $content['id'])
                            ->where('status', 1)
                            ->first();

                        $discount = 0;
                        $pay_amount = $content['price'] - $discount;

                        $order_details = new OrderDetail();

                        $order_details->order_id = $order->id;
                        $order_details->user_id = Auth::id();
                        $order_details->food_type = 1;//1=food
                        $order_details->restaurant_id = $food->restaurant_id;
                        $order_details->food_id = $food->id;
                        $order_details->price = $content['price'];
                        $order_details->discount = $discount;
                        $order_details->payable_amount = $pay_amount;

                        $order_details->status = 1;
                        $order_details->save();
                    }
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
        } catch (\Exception $exception) {
            DB::rollBack();
            return response()->json(['message' => $exception->getMessage()], 500);
        }

        DB::commit();

        return response()->json('', 200);
    }
}
