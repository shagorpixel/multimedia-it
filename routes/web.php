<?php

use App\Http\Controllers\frontendController;
use App\Http\Controllers\SlideController;
use App\Http\Controllers\ServiceFeaturesController;
use Illuminate\Support\Facades\Route;

//Frontend Route Start Here
Route::get('/',[frontendController::class,'home'])->name('homepage');
Route::get('/contact',[frontendController::class,'contact'])->name('contacthomepage');
Route::get('/service',[frontendController::class,'service'])->name('servicepage');
//Frontend Route End Here




Route::get('admin',function(){
    return view('backend.index');
});
Route::resource('admin/slide',SlideController::class);
Route::resource('admin/service-feature',ServiceFeaturesController::class);
