<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Role;

class UserController extends Controller
{
    public function viewRoleList()
    {
    	$userRoles = Role::all();
    	return view('backend.pages.users.user_roles', compact('userRoles'));
    }
}
