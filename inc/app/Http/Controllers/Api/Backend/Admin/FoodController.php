<?php

namespace App\Http\Controllers\Api\Backend\Admin;

use App\Http\Controllers\Controller;
use App\Models\Food;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class FoodController extends Controller
{
    public function storeNewFood(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'restaurant' => 'required',
            'food_category' => 'required',
            'name' => 'required',
            'image' => 'nullable|image',
            'price' => 'required',
            'discount_price' => 'required',
            'description' => 'required',
            'ingredients' => 'required',
            'unit' => 'required',
            'package_count' => 'required',
            'weight' => 'required',
            'featured' => 'nullable',
            'deliverable' => 'nullable'
        ]);
        if ($validator->fails()) {
            $error = $validator->messages();
            return response()->json($error, 400);
        }

        try {

            if($request->hasFile('image'))
            {
                $extension = $request->file('image')->getClientOriginalExtension();
                $fileNameToStore = '_'.time().'.'.$extension;
                $category_image = $request->file('image')->storeAs('food', $fileNameToStore);
            } else {
                $category_image = "";
            }

            $food = new Food();
            $food->restaurant_id = $request->restaurant;
            $food->food_category_id = $request->food_category;
            $food->food_name = $request->name;
            $food->image = $category_image;
            $food->price = $request->price;
            $food->discount_price = $request->discount_price;
            $food->description = $request->description;
            $food->ingredients = $request->ingredients;
            $food->unit = $request->unit;
            $food->package_count = $request->package_count;
            $food->weight = $request->weight;
            $food->featured = $request->featured ?? 0;
            $food->deliverable_food = $request->deliverable ?? 0;
            $food->status = 1;
            $food->save();

            return response()->json($food, 200);

        } catch (\Exception $exception) {
            return response()->json(['message' => $exception->getMessage()], 500);
        }
    }

    public function getAllFood()
    {

        try {
            $foods = Food::orderBy('id', 'desc')->get();

            return response()->json($foods, 200);

        } catch (\Exception $exception) {
            return response()->json(['message' => $exception->getMessage()], 500);
        }
    }

    public function getSingleFood($id)
    {
        try {
            $food = Food::where('id', $id)
                ->first();

            if (!empty($food)) {
                return response()->json($food, 200);
            } else {
                return response()->json(['message' => 'Not Found Food'], 404);
            }

        } catch (\Exception $exception) {
            return response()->json(['message' => $exception->getMessage()], 500);
        }
    }

    public function updateFood(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'restaurant' => 'required',
            'food_category' => 'required',
            'name' => 'required',
            'image' => 'nullable|image',
            'price' => 'required',
            'discount_price' => 'required',
            'description' => 'required',
            'ingredients' => 'required',
            'unit' => 'required',
            'package_count' => 'required',
            'weight' => 'required',
            'featured' => 'nullable',
            'deliverable' => 'nullable',
            'status' => 'required'
        ]);
        if ($validator->fails()) {
            $error = $validator->messages();
            return response()->json($error, 400);
        }

        try {
            $food = Food::where('id', $id)->first();

            if (!empty($food)) {


                if($request->hasFile('image'))
                {
                    $extension = $request->file('image')->getClientOriginalExtension();
                    $fileNameToStore = '_'.time().'.'.$extension;
                    $category_image = $request->file('image')->storeAs('food', $fileNameToStore);
                } else {
                    $category_image = $food->image;
                }

                $food->restaurant_id = $request->restaurant ?? $food->restaurant_id;
                $food->food_category_id = $request->food_category ?? $food->food_category_id;
                $food->food_name = $request->name ?? $food->food_name;
                $food->price = $request->price ?? $food->price;
                $food->discount_price = $request->discount_price ?? $food->discount_price;
                $food->description = $request->description ?? $food->description;
                $food->ingredients = $request->ingredients ?? $food->ingredients;
                $food->unit = $request->unit ?? $food->unit;
                $food->image = $category_image;
                $food->package_count = $request->package_count ?? $food->package_count;
                $food->weight = $request->weight ?? $food->weight;
                $food->featured = $request->featured ?? $food->featured;
                $food->deliverable_food = $request->deliverable_food ?? $food->deliverable_food;
                $food->status = $request->status;

                $food->save();

                return response()->json($food, 200);
            } else {
                return response()->json(['message' => 'Not Found Food'], 404);
            }


        } catch (\Exception $exception) {
            return response()->json(['message' => $exception->getMessage()], 500);
        }
    }

    public function deleteFood($id)
    {
        try {
            $food = Food::where('id', $id)
                ->where('status', 1)
                ->first();

            if (!empty($food)) {
                $food->status = 0;
                $food->save();

                return response()->json(['message' => 'Deleted Success!'], 200);
            } else {
                return response()->json(['message' => 'Not Found Food'], 404);
            }


        } catch (\Exception $exception) {
            return response()->json(['message' => $exception->getMessage()], 500);
        }
    }
}
