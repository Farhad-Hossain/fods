<?php

namespace App\Http\Controllers\Api\Backend\Admin;

use App\Http\Controllers\Controller;
use App\Models\RestaurantTag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RestaurantTagController extends Controller
{
    public function storeNewTag(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required'
        ]);
        if ($validator->fails()) {
            $error = $validator->messages();
            return response()->json($error, 400);
        }

        try {

            $tag = new RestaurantTag();
            $tag->name = $request->name;
            $tag->save();

            return response()->json($tag, 200);

        } catch (\Exception $exception) {
            return response()->json(['message' => $exception->getMessage()], 500);
        }
    }

    public function getAllTags()
    {

        try {
            $tags = RestaurantTag::where('status', 1)
                ->get();

            return response()->json($tags, 200);

        } catch (\Exception $exception) {
            return response()->json(['message' => $exception->getMessage()], 500);
        }
    }

    public function getSingleTag($id)
    {
        try {
            $tag = RestaurantTag::where('id', $id)
                ->where('status', 1)
                ->first();

            if (!empty($tag)) {
                return response()->json($tag, 200);
            } else {
                return response()->json(['message' => 'Not Found Restaurant Tag'], 404);
            }

        } catch (\Exception $exception) {
            return response()->json(['message' => $exception->getMessage()], 500);
        }
    }

    public function updateTag(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required'
        ]);
        if ($validator->fails()) {
            $error = $validator->messages();
            return response()->json($error, 400);
        }

        try {
            $tag = RestaurantTag::where('id', $id)
                ->where('status', 1)
                ->first();

            if (!empty($tag)) {
                $tag->name = $request->name;
                $tag->save();

                return response()->json($tag, 200);
            } else {
                return response()->json(['message' => 'Not Found Restaurant Tag'], 404);
            }


        } catch (\Exception $exception) {
            return response()->json(['message' => $exception->getMessage()], 500);
        }
    }

    public function deleteTag($id)
    {
        try {
            $tag = RestaurantTag::where('id', $id)
                ->where('status', 1)
                ->first();

            if (!empty($tag)) {
                $tag->status = 0;
                $tag->save();

                return response()->json(['message' => 'Deleted Success!'], 200);
            } else {
                return response()->json(['message' => 'Not Found Restaurant Tag'], 404);
            }


        } catch (\Exception $exception) {
            return response()->json(['message' => $exception->getMessage()], 500);
        }
    }
}
