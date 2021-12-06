<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TrailController;
use App\Http\Controllers\HomeController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|<?php


*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/add', function () {
    return view('trails/add');
});
Auth::routes();

Route::get('/delete/img/{id}/{name}', [HomeController::class, 'img_del'])->name('img_del');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('/trails', TrailController::class);
