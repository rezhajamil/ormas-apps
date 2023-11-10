<?php

use App\Http\Controllers\DetailOutletController;
use Illuminate\Support\Facades\Route;


Route::middleware(['auth', 'checkUserRole:admin'])->group(function () {
    Route::resource('detail_outlet', DetailOutletController::class);
});
