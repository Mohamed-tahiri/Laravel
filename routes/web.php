<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
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

Route::get('/admin',[AdminController::class,'login']);
Route::post('/admin',[AdminController::class,'submit_admin']);
Route::get('/admin/dashboard',[AdminController::class,'dashboard']);
Route::get('/admin/create',[AdminController::class,'create']);
Route::post('/admin/create',[AdminController::class,'addPost']);
Route::get('/admin/edit/{id}',[AdminController::class,'edit']);
Route::post('/admin/edit/{id}',[AdminController::class,'editPost']);
Route::get('/admin/delete/{id}',[AdminController::class,'delete']);



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
