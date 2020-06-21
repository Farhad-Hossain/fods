<?php

namespace App\Http\Controllers\Api\Backend\Admin;

use App\Http\Controllers\Controller;
use App\Models\Cuisine;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CuisinesController extends Controller
{
    public function storeNewCuisines(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required'
        ]);
        if ($validator->fails()) {
            $error = $validator->messages();
            return response()->json($error, 400);
        }

        try {

            $cuisines = new Cuisine();
            $cuisines->name = $request->name;
            $cuisines->save();

            return response()->json($cuisines, 200);

        } catch (\Exception $exception) {
            return response()->json(['message' => $exception->getMessage()], 500);
        }
    }

    public function getAllCuisines()
    {

        try {
            $cuisines = Cuisine::where('status', 1)
                ->get();

            return response()->json($cuisines, 200);

        } catch (\Exception $exception) {
            return response()->json(['message' => $exception->getMessage()], 500);
        }
    }

    public function getSingleCuisine($id)
    {
        try {
            $cuisine = Cuisine::where('id', $id)
                ->where('status', 1)
                ->first();

            if (!empty($cuisine)) {
                return response()->json($cuisine, 200);
            } else {
                return response()->json(['message' => 'Not Found Cuisine'], 404);
            }

        } catch (\Exception $exception) {
            return response()->json(['message' => $exception->getMessage()], 500);
        }
    }

    public function updateCuisine(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required'
        ]);
        if ($validator->fails()) {
            $error = $validator->messages();
            return response()->json($error, 400);
        }

        try {
            $cuisine = Cuisine::where('id', $id)
                ->where('status', 1)
                ->first();

            if (!empty($cuisine)) {
                $cuisine->name = $request->name;
                $cuisine->save();

                return response()->json($cuisine, 200);
            } else {
                return response()->json(['message' => 'Not Found Cuisine'], 404);
            }


        } catch (\Exception $exception) {
            return response()->json(['message' => $exception->getMessage()], 500);
        }
    }

    public function deleteCuisine($id)
    {
        try {
            $cuisine = Cuisine::where('id', $id)
                ->where('status', 1)
                ->first();

            if (!empty($cuisine)) {
                $cuisine->status = 0;
                $cuisine->save();

                return response()->json(['message' => 'Deleted Success!'], 200);
            } else {
                return response()->json(['message' => 'Not Found Cuisine'], 404);
            }


        } catch (\Exception $exception) {
            return response()->json(['message' => $exception->getMessage()], 500);
        }
    }
}
