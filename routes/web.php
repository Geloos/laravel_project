<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return redirect(route('authentication.singin'));
});

Route::get('home', function(){
    return view('home');
})->name('home');

Route::controller(AuthController::class)->group(function () {

    Route::get('/singin', 'singin')
        ->name('authentication.singin');

    Route::get('/singup', 'singup')
        ->name('authentication.singup');

    Route::post('/logout', 'logout')
        ->name('authentication.logout');
    
    Route::post('/singup-user', 'singup_user')
        ->name('authentication.singup-user');

    Route::post('/singin-user', 'singin_user')
        ->name('authentication.singin-user');

});
