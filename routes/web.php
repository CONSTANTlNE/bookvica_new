<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ChangeController;
use App\Http\Controllers\ContragentController;
use App\Http\Controllers\HtmxController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\SalesController;
use App\Http\Controllers\StatsController;
use App\Http\Controllers\UploadController;
use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('login');
});



Route::get('/upload',[UploadController::class,'index'])->name('upload');
Route::post('/upload/import',[UploadController::class,'import'])->name('import');

Route::group(['middleware' => 'auth'], function () {

    // General Admin
    Route::get('/',[AdminController::class,'index'])->name('main');
    Route::get('/purchase/deleted',[AdminController::class,'deleted'])->name('deleted');
    Route::get('/log-viewer')->name('log');
    route::post('/daterange', [AdminController::class, 'dateRange'])->name('dateRange');
    route::post('/closeperiod', [AdminController::class, 'closePeriod'])->name('closePeriod');
    route::get('/users', [AdminController::class, 'users'])->name('users');
    route::get('/stock', [AdminController::class, 'stock'])->name('stock');
    route::post('/stock/range', [AdminController::class, 'dateRangeStock'])->name('dateRangeStock');
    route::post('/users/create', [AdminController::class, 'createUser'])->name('createUser');
    route::post('/users/update', [AdminController::class, 'updateUser'])->name('updateUser');


    // Purchase
    Route::post('/purchase/store',[PurchaseController::class,'store'])->name('purchase.store');
    Route::post('/purchase/update',[PurchaseController::class,'purchaseUpdate'])->name('purchase.update');
    Route::get('/purchase/edit/{id}',[PurchaseController::class,'purchaseEdit'])->name('purchase.edit');
    Route::get('/purchase/delete/',[PurchaseController::class,'purchaseDelete'])->name('purchase.delete');



    // Sales
    Route::post('/sales/store',[SalesController::class,'storeSales'])->name('sales.store');
    Route::post('/sales/update',[SalesController::class,'salesUpdate'])->name('sales.update');
    Route::get('/sales/edit/{id}',[SalesController::class,'salesEdit'])->name('sales.edit');
    Route::get('/sales/delete/',[SalesController::class,'salesDelete'])->name('sales.delete');

    // Contragents
    Route::get('/customers',[ContragentController::class,'customers'])->name('customers');
    Route::post('/customer/store',[ContragentController::class,'customerStore'])->name('customer.store');
    Route::post('/customer/delete',[ContragentController::class,'customerDelete'])->name('customer.delete');
    Route::post('/customer/update',[ContragentController::class,'customerUpdate'])->name('customer.update');
    Route::get('/suppliers',[ContragentController::class,'suppliers'])->name('suppliers');
    Route::post('/supplier/store',[ContragentController::class,'supplierStore'])->name('supplier.store');
    Route::post('/supplier/delete',[ContragentController::class,'supplierDelete'])->name('supplier.delete');
    Route::post('/supplier/update',[ContragentController::class,'supplierUpdate'])->name('supplier.update');


    // Changes
    Route::get('/changes',[ChangeController::class,'changes'])->name('changes');
    Route::post('/changes/review',[ChangeController::class,'review'])->name('change.review');



    // Test
    Route::get('/stats',[StatsController::class,'index'])->name('stats');
    Route::get('/stats/contrahents',[StatsController::class,'contrahents'])->name('stats.contrahents');
    Route::get('/test',[StatsController::class,'test'])->name('test');


});

Route::get('/sendsms', [AdminController::class,'sendsms'])->name('sendsms');



// HTMX

Route::get('/htmx', [HtmxController::class,'index'])->name('htmx');
Route::get('/htmx/hello', [HtmxController::class,'hello'])->name('hello');
Route::get('/htmx/table', [HtmxController::class,'tableget'])->name('table');
Route::post('/htmx/table/daterange', [HtmxController::class,'range'])->name('dateRangehtmx');
Route::get('clicktoedit', [HtmxController::class,'clicktoedit'])->name('clicktoedit');
Route::get('/counter', [HtmxController::class,'sessionCounter'])->name('counter');
Route::get('/statshtmx', [HtmxController::class,'statshtmx'])->name('statshtmx');
Route::get('/mainhtmx', [HtmxController::class,'indexhtmx'])->name('indexhtmx');



