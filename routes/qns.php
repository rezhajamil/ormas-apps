<?php

use App\Http\Controllers\QnsController;
use App\Http\Controllers\QnsResponseController;
use App\Http\Controllers\QnsSelectedOptionController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth'])->group(
    function () {
        Route::middleware(['checkUserRole:admin'])->group(function () {
            Route::resource('qns', QnsController::class);
            Route::resource('qns_response', QnsResponseController::class);
            Route::resource('qns_selected_option', QnsSelectedOptionController::class);
        });
    }
);
Route::get('/qns/answer/{id}', [QnsController::class, 'answer'])->name('qns.answer');
Route::post('/qns/answer/{id}', [QnsController::class, 'store_answer'])->name('qns.store_answer');
Route::get('/qns/result/{id}', [QnsController::class, 'result'])->name('qns.result');
Route::get('/qns/result_detail/{id}', [QnsController::class, 'result_detail'])->name('qns.result_detail');
