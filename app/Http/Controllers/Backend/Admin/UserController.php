<?php
namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\Admin\User\UpdateUserPostRequest;
use Illuminate\Http\Request;
use App\User;
use App\Models\Admin;
use App\Models\Role;
use App\Models\AdminUsersRole;
use Illuminate\Support\Facades\Hash;
use Auth;
use DB;

class UserController extends Controller
{

    public function viewUsersList()
    {
    	$users = User::where('role', 0)->orderBy('id', 'desc')->get();
    	return view('backend.pages.users.user_list', compact('users'));
    }

    public function viewMyProfile()
    {
        $myProfile = User::where('id', Auth::user()->id)->with('admin')->get();
        return view('backend.pages.users.myProfile', ['myProfile'=>$myProfile[0]]);
    }

    public function editMyProfileSubmit(Request $request)
    {
        
        DB::beginTransaction();
        try{
            $user = User::find( Auth::user()->id );

            if ( $request->hasFile('profile_avatar') ) {
                $extension = $request->file('profile_avatar')->getClientOriginalExtension();
                $fileNameToStore = '_'.time().'.'.$extension;
                $request->file('profile_avatar')->storeAs('logo',$fileNameToStore);
            } else {
                $fileNameToStore = $user->admin->photo??'';
            }

            $user->name = $request->name;
            $user->email = $request->email;

            $user->admin->photo = 'logo/'.$fileNameToStore;
            $user->admin->designation = $request->designation;
            $user->admin->phone = $request->phone;

            $user->save();
            $user->admin->save();

        } catch (Exception $e) {
            DB::rollback();
            session(['type'=>'danger', 'message'=>'Something went wrong']);
            return redirect()->back();
        }

        DB::commit();
        session(['type'=>'success', 'message'=>'Profile updated successfully.']);
        return redirect()->back();
    }

    public function changePasswordSubmit(Request $request)
    {
        $request->validate([
            'current_password'=>'required',
            'new_password'=>'required',
            'confirm_password'=>'required'
        ]);
        $user = Auth::user();
        
        if ( $request->current_password == $user->password_salt ) {
            if ( $request->new_password == $request->confirm_password ) {
                try {
                    $user->password = Hash::make($request->new_password);
                    $user->password_salt = $request->new_password;

                    session(['type'=>'success', 'message'=>'Password changed.']);
                    $user->save();
                    return redirect()->back();
                } catch ( Exception $e ) {

                }
            } else {
                session(['type'=>'danger', 'message'=>'Confirm Password does not matched.']);
                return redirect()->back();
            }
        } else {
            session(['type'=>'danger', 'message'=>'Wrong Password.']);
            return redirect()->back();
        }
    }

    public function updateUser(UpdateUserPostRequest $request, $id)
    {
        try {
            $user = User::where('id', $id)->first();
            if (empty($user)) {
                session()->flash('type', 'danger');
                session()->flash('message', 'Invalid User');
                return redirect()->back()->withInput();
            }

            $user->name = $request->name;
            $user->email = $request->email;
            if ($request->password != '') {
                $user->password = Hash::make( $request->password );
                $user->password_salt = $request->password;
            }

             $user->save();

        } catch (\Exception $e) {
            session()->flash('type', 'danger');
            session()->flash('message', 'Something went wrong to update.'. $e->getMessage());
            return redirect()->back()->withInput();
        }

        session()->flash('type', 'success');
        session()->flash('message', 'User Updated Successfully');
        return redirect()->back();
    }



    public function deleteUser($id)
    {
        try {
            $user = User::findOrFail($id);
            $user->status = 0;
            $user->save();

            session()->flash('type', 'success');
            session()->flash('message', 'User Deleted Successfully');
            return redirect()->back();
        } catch (\Exception $e) {
            session()->flash('type', 'danger');
            session()->flash('message', 'Something Went Wrong');
            return redirect()->back();
        }

    }

    public function viewRoleList()
    {
    	$userRoles = Role::all();
    	return view('backend.pages.users.user_roles', compact('userRoles'));
    }


    public function createAdminSubmit(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'profile_photo' => 'required',
            'email' => 'required|unique:users,email',
            'phone' => 'required|unique:admins,phone',
            'designation' => 'required',
        ]);

        DB::beginTransaction();
        try{
            $user = new User();
            $user->name = $request->name;
            $user->role = 0;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->password_salt = $request->password;
            $user->last_login_ip = request()->ip();
            $user->save();

            if ( $request->hasFile('profile_photo') ) {
                $extension = $request->file('profile_photo')->getClientOriginalExtension();
                $fileNameToStore = '_'.time().'.'.$extension;
                $profile_photo = $request->file('profile_photo')->storeAs('logo', $fileNameToStore);
            } else {
                $fileNameToStore = '';
            }

            $user_id = $user->id;
            $admin = new Admin();
            $admin->user_id = $user_id;
            $admin->photo = 'logo/'.$fileNameToStore ?? '';
            $admin->phone = $request->phone;
            $admin->designation = $request->designation;
            $admin->description = $request->description ?? '';
            $admin->save();

            $role = new Role();
            $role->user_id = $user_id;
            $role->save();

        } catch (Exception $e) {
            DB::rollBack();
            session(['type'=>'danger', 'message'=>'Something went wrong.']);
            return redirect()->back();            
        }
        DB::commit();

        session(['type'=>'success', 'message'=>'User created successfully']);
        return redirect()->back();
    }
    public function editAdminSubmit(Request $request) 
    {
        
        $user = User::find($request->user_id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->admin->phone = $request->phone;
        $user->admin->designation = $request->designation;
        $user->admin->description = $request->description;

        if ( $request->hasFile('profile_photo') ) {
            $extension = $request->file('profile_photo')->getClientOriginalExtension();
            $fileNameToStore = '_'.time().'.'.$extension;
            $photo = $request->file('profile_photo')->storeAs('logo', $fileNameToStore);
        } else {
            $fileNameToStore = $user->admin->photo ?? '';
        }
        $user->admin->photo = 'logo/'.$fileNameToStore;

        $user->save();
        $user->admin->save();

        session(['type'=>'success', 'message'=>'Updated successfully']);
        return redirect()->back();



    }

    public function access_form_view($user_id)
    {
        $roles = Role::where('user_id', $user_id)->first();
        return view('backend.pages.users.role_manage_form', compact('roles'));
    }
    public function accessFormSubmit(Request $request)
    {
        
        $create_admin = $request->create_admin?1:0 ;
        $edit_admin = $request->edit_admin?1:0;
        $create_restaurant = $request->create_restaurant?1:0;
        $edit_restaurant = $request->edit_restaurant?1:0;
        $create_food = $request->create_food?1:0;
        $edit_food = $request->edit_food?1:0;
        
        

        $roler = Role::where('user_id', $request->user_id)->first();

        // Restaurant
        $roler->restaurant_management = $request->restaurant_management?1:0;
        $roler->create_restaurant = $create_restaurant;
        $roler->edit_restaurant = $edit_restaurant;
        $roler->create_cuisine = $request->create_cuisine?1:0;
        $roler->see_restaurant_sales_transaction = $request->see_restaurant_sales_transaction?1:0;
        $roler->make_restaurant_withdrawal = $request->make_restaurant_withdrawal?1:0;
        $roler->restaurant_rating_review = $request->restaurant_rating_review?1:0;
        $roler->restaurant_tag = $request->restaurant_tag?1:0;
        // Food
        $roler->create_food = $create_food;
        $roler->see_food_list = $request->see_food_list?1:0;
        $roler->edit_food = $edit_food;
        $roler->food_category = $request->food_category?1:0;
        $roler->extra_food = $request->extra_food?1:0;
        $roler->food_rating_review = $request->food_rating_review?1:0;
        // Order Managewment
        $roler->order_management = $request->order_management?1:0;
        $roler->see_order_list = $request->see_order_list?1:0;
        $roler->order_status = $request->order_status?1:0;
        // User
        $roler->user_management = $request->user_management?1:0;
        $roler->create_admin = $create_admin;
        $roler->edit_admin = $edit_admin;
        // Driver
        $roler->create_driver = $request->create_driver?1:0;
        $roler->edit_driver = $request->edit_driver?1:0;
        // Global Settings
        $roler->global_setting = $request->global_setting?1:0;
        $roler->see_order_list = $request->see_order_list?1:0;

        $roler->save();        
        session(['type'=>'success', 'message'=>'User access updated.']);
        return redirect()->back();
    }

    public function adminUserRole()
    {
        $admin_user_roles = AdminUsersRole::where('status', 1)->get();
        return view('backend.pages.users.admin_role_list', compact('admin_user_roles'));
    }
    public function adminUserRoleCreateSubmit(Request $request)
    {
        dd($request->all);
    }
    public function adminRoleCreateForm()
    {
        dd('hhh');
    }
    
    

}
