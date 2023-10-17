<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


Route::middleware(['auth', 'checkUserRole:admin'])->group(function () {
    Route::resource('user', UserController::class);
    Route::get('/user/change_status/{id}', [UserController::class, 'change_status'])->name('user.change_status');
});
