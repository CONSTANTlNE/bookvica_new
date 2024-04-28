<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\UploadController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});



Route::get('/upload',[UploadController::class,'index'])->name('upload');
Route::post('/upload/import',[UploadController::class,'import'])->name('import');


Route::get('/main',[AdminController::class,'index'])->name('main');

Route::post('/purchase/store',[AdminController::class,'store'])->name('purchase.store');
