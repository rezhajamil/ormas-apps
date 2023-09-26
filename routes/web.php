<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::middleware(['auth'])->group(function () {
    Route::get('/', function () {
        $userRole = auth()->user()->role;
        if ($userRole == 'superadmin' || $userRole == 'admin') {
            return redirect()->route('dashboard.index');
        } else {
            return redirect()->route('home.index');
        }
    });

    Route::middleware(['checkUserRole:admin'])->group(function () {
        Route::resource('dashboard', DashboardController::class);
    });

    Route::resource('home', HomeController::class);
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');



require __DIR__ . '/user.php';
require __DIR__ . '/qns.php';

require __DIR__ . '/auth.php';
