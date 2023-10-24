<?php

use App\Http\Controllers\FMController;
use Illuminate\Support\Facades\Route;


Route::middleware(['auth', 'checkUserRole:admin'])->group(function () {
    Route::resource('fm', FMController::class);
    Route::get('/fm/change_status/{id}', [FMController::class, 'change_status'])->name('fm.change_status');
});
