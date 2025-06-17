<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TransactionController;


Route::middleware('web')->group(function () {
    Route::controller(TransactionController::class)->group(function () {

        Route::get('/', 'index')
            ->name('index');

        Route::get('/{transactionId}/edit', 'edit')
            ->wherenumber('transactionId')
            ->name('edit');

        Route::get('/create', 'create')
            ->name('create');

        Route::put('/{transactionId}/update', 'update')
            ->name('update');
        
        Route::delete('/{transactionId}', 'destroy')
            ->name('destroy');

        Route::post('/{transactionId}', 'update')
            ->name('store');

        Route::post('/', 'store')
            ->name('store');

    });
});
