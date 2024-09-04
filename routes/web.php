<?php

use App\Http\Controllers\SlideController;
use App\Http\Controllers\ServiceFeaturesController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('website.home');
});

Route::get('admin',function(){
    return view('backend.index');
});
Route::resource('admin/slide',SlideController::class);
Route::resource('admin/service-feature',ServiceFeaturesController::class);
