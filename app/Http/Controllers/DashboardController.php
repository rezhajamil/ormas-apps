<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $admin_users = User::where('role', 'admin')->where('status', 1)->count();
        $sf_users = User::where('role', 'sf')->where('status', 1)->count();

        return view('dashboard.index', compact('admin_users', 'sf_users'));
    }
}
