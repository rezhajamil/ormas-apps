<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $users = User::where('role', '!=', 'superadmin')->where('status', 1)->count();

        return view('dashboard.index', compact('users'));
    }
}
