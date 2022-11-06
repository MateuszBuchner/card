<?php

use App\Http\Controllers\AccountsController;
use App\Http\Controllers\CardController;
use App\Http\Controllers\IbanController;
use Illuminate\Support\Facades\Route;

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



Route::post('/', [AccountsController::class, 'store']);

Route::resource('/', AccountsController::class)->only([
    'index', 'store'
]);


