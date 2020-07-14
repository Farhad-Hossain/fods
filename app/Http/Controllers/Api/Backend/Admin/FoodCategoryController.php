<?php

namespace App\Http\Controllers\Api\Backend\Admin;

use App\Http\Controllers\Controller;
use App\Models\FoodCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class FoodCategoryController extends Controller
{
    public function storeNewFoodCategory(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:food_categories,name',
            'description' => 'nullable',
            'image' => 'nullable|image'
        ]);
        if ($validator->fails()) {
            $error = $validator->messages();
            return response()->json($error, 400);
        }

        try {

            if ($request->hasFile('image')) {
                $extension = $request->file('image')->getClientOriginalExtension();
                $fileNameToStore = '_' . time() . '.' . $extension;
                $category_image = $request->file('image')->storeAs('category', $fileNameToStore);
            } else {
                $category_image = "";
            }

            $category = new FoodCategory();
            $category->name = $request->name;
            $category->description = $request->description;
            $category->image = $category_image;
            $category->save();

            return response()->json($category, 200);

        } catch (\Exception $exception) {
            return response()->json(['message' => $exception->getMessage()], 500);
        }
    }

    public function getAllFoodCategory()
    {

        try {
            $food_categories = FoodCategory::all();

            return response()->json($food_categories, 200);

        } catch (\Exception $exception) {
            return response()->json(['message' => $exception->getMessage()], 500);
        }
    }

    public function getSingleFoodCategory($id)
    {
        try {
            $food_category = FoodCategory::where('id', $id)
                ->first();

            if (!empty($food_category)) {
                return response()->json($food_category, 200);
            } else {
                return response()->json(['message' => 'Not Found Food Category'], 404);
            }

        } catch (\Exception $exception) {
            return response()->json(['message' => $exception->getMessage()], 500);
        }
    }

    public function updateFoodCategory(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'description' => 'required',
            'status' => 'required',
        ]);
        if ($validator->fails()) {
            $error = $validator->messages();
            return response()->json($error, 400);
        }

        try {
            $category = FoodCategory::where('id', $id)->first();

            if (!empty($category)) {


                if ($request->hasFile('image')) {
                    $extension = $request->file('image')->getClientOriginalExtension();
                    $fileNameToStore = '_' . time() . '.' . $extension;
                    $category_image = $request->file('image')->storeAs('category', $fileNameToStore);
                } else {
                    $category_image = $category->image ?? '';
                }

                $category->name = $request->name;
                $category->description = $request->description;
                $category->image = $category_image;
                $category->status = $request->status;
                $category->save();

                return response()->json($category, 200);
            } else {
                return response()->json(['message' => 'Not Found Food Category'], 404);
            }


        } catch (\Exception $exception) {
            return response()->json(['message' => $exception->getMessage()], 500);
        }
    }

    public function deleteFoodCategory($id)
    {
        try {
            $category = FoodCategory::where('id', $id)
                ->where('status', 1)
                ->first();

            if (!empty($category)) {
                $category->status = 0;
                $category->save();

                return response()->json(['message' => 'Deleted Success!'], 200);
            } else {
                return response()->json(['message' => 'Not Found Food Category'], 404);
            }


        } catch (\Exception $exception) {
            return response()->json(['message' => $exception->getMessage()], 500);
        }
    }
}
