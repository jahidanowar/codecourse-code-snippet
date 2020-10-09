<?php

use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'auth', 'namespace' => 'App\Http\Controllers\Auth'], function () {
    Route::post('/login', 'LoginController');
    Route::get('/me', 'MeController');
    Route::post('/logout', 'LogOutController');
});
