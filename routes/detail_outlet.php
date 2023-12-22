<?php

use App\Http\Controllers\DetailOutletController;
use App\Models\DetailOutlet;
use Illuminate\Support\Facades\Route;


Route::middleware(['auth', 'checkUserRole:admin'])->group(function () {
    Route::resource('detail_outlet', DetailOutletController::class);
    Route::delete('destroy_by_date/detail_outlet', [DetailOutletController::class, 'destroy_by_date'])->name('detail_outlet.destroy_by_date');
});
