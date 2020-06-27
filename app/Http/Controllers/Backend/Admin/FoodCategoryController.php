<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\Admin\Food\CreateFoodCategoryPostRequest;
use App\Http\Requests\Backend\Admin\Food\EditFoodCategoryPostRequest;
use App\Models\FoodCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FoodCategoryController extends Controller
{
    public function addFoodCategoryPage()
    {
        return view('backend.pages.food.category.add_food_category');
    }

    public function storeFoodCategory(CreateFoodCategoryPostRequest $request)
    {

        DB::beginTransaction();
        try {

            if($request->hasFile('image'))
            {
                $extension = $request->file('image')->getClientOriginalExtension();
                $fileNameToStore = '_'.time().'.'.$extension;
                $category_image = $request->file('image')->storeAs('category', $fileNameToStore);
            } else {
                $fileNameToStore = "";
            }

            $category = new FoodCategory();
            $category->name = $request->name;
            $category->description = $request->description;
            $category->image = $fileNameToStore;
            $category->save();


        } catch (\Exception $e) {
            DB::rollBack();
            session()->flash('type', 'danger');
            session()->flash('message', 'Something went wrong to add food category. '.$e->getMessage());
            return redirect()->back()->withInput();
        }
        DB::commit();
        session()->flash('type', 'success');
        session()->flash('message', 'Food Category Added Successfully');
        return redirect()->back();
    }

    public function showFoodCategoryList()
    {
        $food_categories = FoodCategory::where('status', '<>', 3)->get();
        return view('backend.pages.food.category.food_category_list', compact('food_categories'));
    }

    public function editFoodCategoryPage($id)
    {
        $category = FoodCategory::findOrFail($id);
        return view('backend.pages.food.category.edit_food_category', compact('category'));
    }
    
    public function updateFoodCategory(EditFoodCategoryPostRequest $request)
    {

        DB::beginTransaction();

        try{
            $category = FoodCategory::findOrFail($request->id);

            if($request->hasFile('image'))
            {
                $extension = $request->file('image')->getClientOriginalExtension();
                $fileNameToStore = '_'.time().'.'.$extension;
                $category_image = $request->file('image')->storeAs('category', $fileNameToStore);
            } else {
                $fileNameToStore = $category->image ?? '';
            }

            $category->name = $request->name;
            $category->description = $request->description;
            $category->image = $fileNameToStore;
            $category->status = $request->status;
            $category->save();
        }catch(Exception $e){
            DB::rollBack();
            session()->flash('type', 'danger');
            session()->flash('message', 'Something went wrong to add food category. '.$e->getMessage());
            return redirect()->back();
        }
        DB::commit();
        session()->flash('type', 'success');
        session()->flash('message', 'Food Category Updated Successfully');
        return redirect()->route('backend.food.category.list');   

    }

    public function deleteFoodCategory($id)
    {
        try{
            $category = FoodCategory::findOrFail($id);
            $category->status = 0;
            $category->save();

            session()->flash('type', 'success');
            session()->flash('message', 'Food Category Deleted Successfully');
            return redirect()->route('backend.food.category.list');               
        }catch(Exception $e){
            session()->flash('type', 'danger');
            session()->flash('message', 'Something Went Wrong');
            return redirect()->route('backend.food.category.list');               
        }

    }


}
