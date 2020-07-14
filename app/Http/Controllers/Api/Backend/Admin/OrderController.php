<?php

namespace App\Http\Controllers\Api\Backend\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function getAllOrders()
    {

        try {
            $orders = Order::orderBy('id', 'desc')->get();

            return response()->json($orders, 200);

        } catch (\Exception $exception) {
            return response()->json(['message' => $exception->getMessage()], 500);
        }
    }

    public function getSingleOrder($id)
    {
        try {
            $order = Order::where('id', $id)
                ->first();

            if (!empty($order)) {
                return response()->json($order, 200);
            } else {
                return response()->json(['message' => 'Not Found Order'], 404);
            }

        } catch (\Exception $exception) {
            return response()->json(['message' => $exception->getMessage()], 500);
        }
    }

    public function getOrderDetails($id)
    {
        try {
            $order = Order::with('details')->where('id', $id)
                ->first();

            if (!empty($order)) {
                return response()->json($order, 200);
            } else {
                return response()->json(['message' => 'Not Found Order'], 404);
            }

        } catch (\Exception $exception) {
            return response()->json(['message' => $exception->getMessage()], 500);
        }
    }
}
