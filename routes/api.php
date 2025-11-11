<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AccountsController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\TransactionsController;
use App\Http\Controllers\AuthController;

Route::post('/login',[AuthController::class,'login']);

Route::middleware(['jwt'])->group(function () {
    Route::resource('accounts',AccountsController::class);
    Route::post('changestatus',[AccountsController::class,'changeStatus']);
    Route::resource('categories',CategoriesController::class);
    Route::resource('transaction',TransactionsController::class);
});

//EndPoint






Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
