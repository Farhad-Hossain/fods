<?php
namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Models\Role;

class UserController extends Controller
{
    public function viewUsersList()
    {
    	$users = User::orderBy('id', 'desc')->get();
    	return view('backend.pages.users.user_list', compact('users'));
    }
    public function viewRoleList()
    {
    	$userRoles = Role::all();
    	return view('backend.pages.users.user_roles', compact('userRoles'));
    }

}
