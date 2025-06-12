<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function index()
{
    $users = \App\Models\User::all();
    return view('admin.users', compact('users'));
}
}