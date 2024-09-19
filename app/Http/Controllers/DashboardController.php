<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class DashboardController extends Controller
{
    public function index()
    {
        $users = User::all();
        $permissions = Permission::all();
        return view('dashboard', compact('users', 'permissions'));
    }
}
