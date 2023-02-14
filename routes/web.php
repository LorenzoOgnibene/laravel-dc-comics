<?php

use App\Http\Controllers\comics_controller as comics_controller;
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

//Route::get('/', [comics_controller::class, 'index']);
//Route::get('/{id}', [comics_controller::class, 'show']);


Route::resource('comics', comics_controller::class);