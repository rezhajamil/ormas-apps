<?php

use App\Http\Controllers\ResultController;
use Illuminate\Support\Facades\Route;


Route::middleware(['auth', 'checkUserRole:admin'])->group(function () {
    Route::resource('result', ResultController::class);
    Route::get('/result/change_status/{id}', [ResultController::class, 'change_status'])->name('result.change_status');
});
