<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('image-crop', [\App\Http\Controllers\ImageController::class,'index']);
Route::post('image-crop', [\App\Http\Controllers\ImageController::class,'cropImage'])->name('image.crop');
