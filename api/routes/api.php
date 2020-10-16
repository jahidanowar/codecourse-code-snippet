<?php

use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'auth', 'namespace' => 'App\Http\Controllers\Auth'], function () {
    Route::post('login', 'LoginController');
    Route::get('me', 'MeController');
    Route::post('logout', 'LogOutController');
});

Route::group(['prefix' => 'snippets', 'namespace' => 'App\Http\Controllers\Snippets'], function () {
    Route::post('', 'SnippetController@store');
    Route::get('{snippet}', 'SnippetController@show');
    Route::patch('{snippet}', 'SnippetController@update');
    Route::patch('{snippet}/steps/{step}', 'StepController@update');
    Route::delete('{snippet}/steps/{step}', 'StepController@destroy');
    Route::post('{snippet}/steps', 'StepController@store');
});
