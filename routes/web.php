<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\TransaksiDetailController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\HomeController;

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
    return view('Auth.login');
});
Route::group(['middleware' => 'auth'], function(){
Route::resource('produk', ProdukController::class);
Route::resource('transaksi', TransaksiController::class);
Route::resource('transaksiDetail', TransaksiDetailController::class);
Route::resource('customer', CustomerController::class);
Route::resource('kategori', KategoriController::class);
Route::post('logout', LogoutController::class)->name('logout');
// Route::get('{transaksi}', TransaksiController::class, 'show')->name('transaksi.show');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
