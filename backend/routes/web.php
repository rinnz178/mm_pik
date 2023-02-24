<?php

use App\Http\Controllers\BackendController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StatusController;
use App\Http\Controllers\OrderController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', function () {
    return view('dashboard');
});

Route::resource('order','OrderController');
Route::resource('categories','CategoriesController');
Route::resource('done-order','BackendController');


Route::get('/cancel-order', [BackendController::class, 'cancel']);
Route::get('/changeStatus/{id}', [OrderController::class, 'changeStatus']);
Route::get('/changeCancel/{id}', [OrderController::class, 'changeCancel']);

