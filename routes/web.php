<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\UserController;

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
Route::get('blog',[BlogController::class,'index'])->name('blog');
Route::get('blogs',[BlogController::class,'list'])->name('blogs')->middleware('auth');
Route::get('blogs/tambah',[BlogController::class,'create'])->name('posting')->middleware('auth');
Route::post('blogs/tambah',[BlogController::class,'store'])->name('posting')->middleware('auth');
Route::get('blogs/edit/{id}',[BlogController::class,'edit'])->name('edit.blog')->middleware('auth');
Route::post('blogs/edit/{id}',[BlogController::class,'update'])->name('update.blog')->middleware('auth');
Route::get('blogs/hapus/{id}',[BlogController::class,'destroy'])->name('hapus.blog')->middleware('auth');
Route::get('kategori',[CategoryController::class,'index'])->name('kategori')->middleware('auth');
Route::get('kategori/tambah',[CategoryController::class,'create'])->name('tambah.kategori')->middleware('auth');
Route::post('kategori/tambah',[CategoryController::class,'store'])->name('tambah.kategori')->middleware('auth');
Route::get('kategori/edit/{id}',[CategoryController::class,'edit'])->name('edit.kategori')->middleware('auth');
Route::post('kategori/edit/{id}',[CategoryController::class,'update'])->name('update.kategori')->middleware('auth');
Route::get('kategori/hapus/{id}',[CategoryController::class,'destroy'])->name('hapus.kategori')->middleware('auth');
Route::get('tag',[TagController::class,'index'])->name('tag')->middleware('auth');
Route::get('tag/tambah',[TagController::class,'create'])->name('tambah.tag')->middleware('auth');
Route::post('tag/tambah',[TagController::class,'store'])->name('tambah.tag')->middleware('auth');
Route::get('tag/edit/{id}',[TagController::class,'edit'])->name('edit.tag')->middleware('auth');
Route::post('tag/edit/{id}',[TagController::class,'update'])->name('update.tag')->middleware('auth');
Route::get('tag/hapus/{id}',[TagController::class,'destroy'])->name('hapus.tag')->middleware('auth');
Route::get('blog/{slug}',[BlogController::class,'detail'])->name('blog.detail');
Route::get('blog/filter/kategori/{kategori}',[BlogController::class,'filterByCategory'])->name('blog.filter.kategori');
Route::get('blog/filter/tags/{id}',[BlogController::class,'filterByTag'])->name('blog.filter.tag');
Route::get('pengaturan/profil/{id}',[UserController::class,'setting_profile'])->name('ubah.profil')->middleware('auth');
Route::post('pengaturan/profil/{id}',[UserController::class,'store_profile'])->name('ubah.profil')->middleware('auth');
Route::get('pengaturan/password/{id}',[UserController::class,'setting_password'])->name('ubah.password')->middleware('auth');
Route::post('pengaturan/password/{id}',[UserController::class,'change_password'])->name('ubah.password')->middleware('auth');


