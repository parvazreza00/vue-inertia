<?php

use App\Http\Controllers\CustomerController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/customers/create' ,[CustomerController::class, 'create']);
Route::get('/customers/data' ,[CustomerController::class, 'index'])->name('customers.index');
Route::post('/customers' ,[CustomerController::class, 'store']);
Route::delete('/customers/{id}' ,[CustomerController::class, 'custormer_destroy']);
Route::get('/customers/{id}/edit' ,[CustomerController::class, 'custormer_edit']);
Route::put('/customers/{id}' ,[CustomerController::class, 'customer_update']);
Route::get('/customers/{id}/view' ,[CustomerController::class, 'customer_view']);
