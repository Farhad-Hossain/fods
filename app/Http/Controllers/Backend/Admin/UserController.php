<?php
namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\Admin\User\UpdateUserPostRequest;
use Illuminate\Http\Request;
use App\User;
use App\Models\Role;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function viewUsersList()
    {
    	$users = User::orderBy('id', 'desc')->get();
    	return view('backend.pages.users.user_list', compact('users'));
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
    
    

}
