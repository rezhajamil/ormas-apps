<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Rules\TelkomselNumber;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menu = 'user';
        $users = User::whereNotIn('role', ['superadmin'])->orderBy('cluster')->orderBy('name')->get();

        return view('dashboard.user.index', compact('menu', 'users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cluster = DB::table('territory')->select('cluster')->where('branch', 'PADANG')->orderBy('cluster')->distinct()->get();

        if (auth()->user()->role == 'superadmin') {
            $role = ['admin', 'sf'];
        } else if (auth()->user()->role == 'admin') {
            $role = ['sf'];
        }

        return view('dashboard.user.create', compact('cluster', 'role'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'cluster' => ['required'],
            'id_digipos' => ['required', 'numeric'],
            'name' => ['required'],
            'telp' => ['required', 'numeric', 'unique:users,telp', new TelkomselNumber],
            'email' => ['required', 'email', 'unique:users,email'],
            'username' => ['required', 'unique:users,email'],
            'password' => ['required'],
            'role' => ['required'],
        ]);

        $user = User::create([
            'cluster' => $request->cluster,
            'id_digipos' => $request->id_digipos,
            'name' => ucwords(strtolower($request->name)),
            'telp' => $request->telp,
            'email' => $request->email,
            'username' => $request->username,
            'password' => bcrypt($request->password),
            'raw_password' => $request->password,
            'role' => $request->role
        ]);

        return redirect()->route('user.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $cluster = DB::table('territory')->select('cluster')->where('branch', 'PADANG')->orderBy('cluster')->distinct()->get();

        if (auth()->user()->role == 'superadmin') {
            $role = ['admin', 'sf'];
        } else if (auth()->user()->role == 'admin') {
            $role = ['sf'];
        }
        return view('dashboard.user.edit', compact('role', 'cluster', 'user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'cluster' => ['required'],
            'id_digipos' => ['required', 'numeric'],
            'name' => ['required'],
            'telp' => ['required', 'numeric', new TelkomselNumber],
            'email' => ['required', 'email'],
            'username' => ['required'],
            'password' => ['required'],
            'role' => ['required'],
        ]);

        $user->cluster = $request->cluster;
        $user->id_digipos = $request->id_digipos;
        $user->name = ucwords(strtolower($request->name));
        $user->telp = $request->telp;
        $user->email = $request->email;
        $user->username = $request->username;
        $user->password = bcrypt($request->password);
        $user->raw_password = $request->password;
        $user->role = $request->role;

        $user->save();

        return redirect()->route('user.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }

    public function change_status($id)
    {
        $user = User::find($id);
        $user->status = !$user->status;
        $user->save();

        return back();
    }
}
