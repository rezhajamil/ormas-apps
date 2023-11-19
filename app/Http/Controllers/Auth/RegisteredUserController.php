<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use App\Rules\TelkomselNumber;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $cluster = DB::table('territory')->select('cluster')->where('branch', 'PADANG')->orderBy('cluster')->distinct()->get();

        return view('auth.register', compact('cluster'));
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {

        $request->validate([
            'cluster' => ['required'],
            'id_digipos' => ['required', 'numeric'],
            'name' => ['required'],
            'telp' => ['required', 'numeric', 'unique:users,telp', new TelkomselNumber],
            'email' => ['required', 'email', 'unique:users,email'],
            'username' => ['required', 'unique:users,username'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
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
            'role' => 'admin',
            'status' => 0,
        ]);

        // event(new Registered($user));

        // Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
