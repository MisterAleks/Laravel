<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\user;
use App\role;
use App\department;
use App\group;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin');
    }

    public function saveUser(Request $request)
    {
        $user["id"] = $request->input('u_id');
        $user["name"] = $request->input('u_name');
        $user["password"] = $request->input('password');
        $user["role"] = $request->input('r_id');
        $user["group"] = $request->input('g_id');
        $user["department"] = $request->input('d_id');

        (new user())->saveUser($user);
    }

    public function deleteUser($id)
    {
        (new user())->deleteUser($id); 
    }

    //Блок обновлений
    public function refreshUser()
    {
        return (new user())->getUsersData();
        //return user::all()->toArray();
    }

    public function refreshRole()
    {
        return role::all()->toArray();
    }

    public function refreshDepartment()
    {
        return department::all()->toArray();
    }

    public function refreshGroup()
    {
        return group::all()->toArray();
    }
}
