<?php

use Illuminate\Support\Facades\Route;

Route::group(['name' => 'api'], function () {
    Route::get('/project', [App\Http\Controllers\Api\ProjectController::class, 'index']);
    Route::get('/project/{id}', [App\Http\Controllers\Api\ProjectController::class, 'show']);
    Route::get('/categories', [App\Http\Controllers\Api\ProjectController::class, 'index']);
    Route::get('/category/{id}', [App\Http\Controllers\Api\ProjectController::class, 'show']);
    Route::get('/about', [App\Http\Controllers\Api\AboutController::class, 'index']);
    Route::get('/about/{id}', [App\Http\Controllers\Api\AboutController::class, 'show']);
    Route::get('/slider', [App\Http\Controllers\Api\SliderController::class, 'index']);
    Route::get('/slider/{id}', [App\Http\Controllers\Api\SliderController::class, 'show']);
    Route::get('/certificate', [App\Http\Controllers\Api\SertificateController::class, 'index']);
    Route::get('/certificate/{id}', [App\Http\Controllers\Api\SertificateController::class, 'show']);
    Route::get('/search/{keyword}',[App\Http\Controllers\Api\SearchController::class,'search']);
    Route::get('/settings', function () {
        return App\Models\Setting::all();
    });
});
