<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;

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

Route::get('/',[HomeController::class,'index']);
Route::get('/gallery',[GalleryController::class,'index']);
Route::get('admin',[AdminController::class,'index'])->name('admin')->middleware('auth');
Route::get('login',[AuthController::class,'index'])->name('login')->middleware('guest');
Route::post('login',[AuthController::class,'login'])->name('login');
Route::get('register',[AuthController::class,'register'])->name('register');
Route::post('register',[AuthController::class,'store'])->name('register');
Route::get('logout',[AuthController::class,'logout'])->name('logout');
Route::get('product',[ProductController::class,'index'])->name('product')->middleware('auth');
Route::get('product/tambah',[ProductController::class,'create'])->name('tambah.produk')->middleware('auth');
Route::post('product/tambah',[ProductController::class,'store'])->name('tambah.produk');


