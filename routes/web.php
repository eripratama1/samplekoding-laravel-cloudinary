<?php

use App\Http\Controllers\CloudinaryController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});

Route::resource('cloudinary',CloudinaryController::class);
