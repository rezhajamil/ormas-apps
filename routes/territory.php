<?php

use App\Http\Controllers\FMController;
use App\Http\Controllers\TerritoryController;
use Illuminate\Support\Facades\Route;


Route::get('territory/get_kecamatan', [TerritoryController::class, 'get_kecamatan'])->name('territory.get_kecamatan');
