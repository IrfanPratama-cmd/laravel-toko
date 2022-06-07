<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\PesananController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\KategoriController;

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

// Route::get('/', function () {
//     return view('home');
// });

Route::get('/login', [AuthController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [AuthController::class, 'postLogin']);
Route::post('/logout', [AuthController::class, 'logout']);

Route::get('/register', [AuthController::class, 'register'])->middleware('guest');
Route::post('/register', [AuthController::class, 'postRegister']);

Route::get('/', [HomeController::class, 'index']);
Route::get('/homebarang', [HomeController::class, 'barang'])->middleware('auth');
Route::get('/categories', [HomeController::class, 'categories'])->middleware('auth');
// Route::get('/homekategori', [HomeController::class, 'kategori'])->middleware('auth');
Route::get('/homekategori/{id}', [HomeController::class, 'kategori'])->middleware('auth');
Route::get('/showbarang/{id}', [HomeController::class, 'show']);

Route::get('/dashboard', [HomeController::class, 'admin'])->middleware('role:Admin');
Route::get('/admin', [HomeController::class, 'admin'])->middleware('role:Admin');
Route::get('/user', [ProfileController::class, 'user'])->middleware('role:Admin');
Route::get('/showProfile/{id}', [ProfileController::class, 'show'])->middleware('role:Admin');
Route::get('/profile', [UserController::class, 'index'])->middleware('role:User');
Route::get('/detailProfile', [ProfileController::class, 'profile'])->middleware('role:User');
// Route::get('/editProfile/{id}/edit', [ProfileController::class, 'editProfile'])->middleware('role:User');
// Route::put('/updateProfile/{id}', [ProfileController::class, 'updateProfile'])->middleware('role:User');

Route::resource('kategori', KategoriController::class)->middleware('role:Admin');;
Route::resource('profile', ProfileController::class)->middleware('role:User');;
Route::resource('barang', BarangController::class)->middleware('role:Admin');;

Route::get('/cart', [CartController::class, 'cart'])->middleware('role:User');
Route::get('/pesan/{id}', [CartController::class, 'pesan'])->name('add.to.cart')->middleware('role:User');
Route::patch('update-cart', [CartController::class, 'update'])->name('update.cart')->middleware('role:User');
Route::delete('remove-cart', [CartController::class, 'delete'])->name('remove.cart')->middleware('role:User');

Route::get('/daftar-pesanan', [PesananController::class, 'daftarpesanan'])->middleware('role:Admin');
Route::post('/pesanan', [PesananController::class, 'pesanan'])->middleware('role:User');
Route::get('/barangku', [PesananController::class, 'index'])->middleware('role:User');
Route::delete('barangku/{id}', [PesananController::class, 'destroy'])->middleware('role:User');
Route::patch('barangku/{id}', [PesananController::class, 'bayar'])->middleware('role:User');
Route::put('barangku/{id}', [PesananController::class, 'batal'])->middleware('role:User');
Route::get('showbarang/{id}', [PesananController::class, 'show'])->middleware('role:User');

Route::patch('/daftar-pesanan/{id}', [PesananController::class, 'kirim'])->middleware('role:Admin');
Route::put('/daftar-pesanan/{id}', [PesananController::class, 'batalKirim'])->middleware('role:Admin');
