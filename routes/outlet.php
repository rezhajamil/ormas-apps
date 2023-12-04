<?php

use App\Http\Controllers\OutletController;
use Illuminate\Support\Facades\Route;


Route::middleware(['auth', 'checkUserRole:admin'])->group(function () {
    Route::resource('outlet', OutletController::class);
    Route::get('/outlet/change_status/{id}', [OutletController::class, 'change_status'])->name('outlet.change_status');
});

Route::get('/get_outlet', [OutletController::class, 'get_outlet'])->name('outlet.get_outlet');
Route::get('/get_outlet_by_digipos', [OutletController::class, 'get_outlet_by_digipos'])->name('outlet.get_outlet_by_digipos');
Route::get('/outlet/detail_list', [OutletController::class, 'detail_list'])->name('outlet.detail_list');
Route::get('/outlet/detail/{id_outlet}', [OutletController::class, 'detail'])->name('outlet.detail');
