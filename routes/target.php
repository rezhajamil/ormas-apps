<?php

use App\Http\Controllers\TargetController;
use Illuminate\Support\Facades\Route;


Route::middleware(['auth', 'checkUserRole:admin'])->group(function () {
    Route::resource('target', TargetController::class);
    Route::get('/result/change_status/{id}', [TargetController::class, 'change_status'])->name('target.change_status');
});
