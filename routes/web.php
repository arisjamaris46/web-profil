<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ContactController;

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

Route::get('/',[HomeController::class,'index'])->name('home');
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
Route::get('product/edit/{id}',[ProductController::class,'edit'])->name('edit.produk')->middleware('auth');
Route::post('product/edit/{id}',[ProductController::class,'update'])->name('update.produk')->middleware('auth');
Route::get('product/hapus/{id}',[ProductController::class,'destroy'])->name('hapus.produk')->middleware('auth');
Route::get('klien',[ClientController::class,'index'])->name('klien')->middleware('auth');
Route::get('klien/tambah',[ClientController::class,'create'])->name('tambah.klien')->middleware('auth');
Route::post('klien/tambah',[ClientController::class,'store'])->name('tambah.klien');
Route::get('klien/edit/{id}',[ClientController::class,'edit'])->name('edit.klien')->middleware('auth');
Route::post('klien/edit/{id}',[ClientController::class,'update'])->name('update.klien')->middleware('auth');
Route::get('klien/hapus/{id}',[ClientController::class,'destroy'])->name('hapus.klien')->middleware('auth');
Route::get('kontak/send',[ContactController::class,'send_message'])->name('kirim.pesan');
Route::get('kontak',[ContactController::class,'index'])->name('kontak.pesan')->middleware('auth');
Route::get('approve_pesanan/{id}',[ContactController::class,'approve'])->name('approve.pesanan')->middleware('auth');
Route::get('progress_pesanan/{id}',[ContactController::class,'progress'])->name('progress.pesanan')->middleware('auth');


