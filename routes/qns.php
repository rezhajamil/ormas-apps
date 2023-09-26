<?php

use App\Http\Controllers\QnsController;
use Illuminate\Support\Facades\Route;

Route::resource('qns', QnsController::class);
