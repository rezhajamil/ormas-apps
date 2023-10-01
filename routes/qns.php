<?php

use App\Http\Controllers\QnsController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth'])->group(
    function () {
        Route::middleware(['checkUserRole:admin'])->group(function () {
            Route::resource('qns', QnsController::class);
        });

        Route::get('/qns/answer/{id}', [QnsController::class, 'answer'])->name('qns.answer');
        Route::post('/qns/answer/{id}', [QnsController::class, 'store_answer'])->name('qns.store_answer');
        Route::get('/qns/result/{id}', [QnsController::class, 'result'])->name('qns.result');
    }
);
