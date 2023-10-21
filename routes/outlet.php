<?php

use App\Http\Controllers\OutletController;
use Illuminate\Support\Facades\Route;


Route::middleware(['auth', 'checkUserRole:admin'])->group(function () {
    Route::resource('outlet', OutletController::class);
    Route::get('/user/change_status/{id}', [OutletController::class, 'change_status'])->name('user.change_status');
});
