<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\ActionController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PenjualanController;
use App\Http\Controllers\StokStandController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;

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
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('handle_login');

Route::middleware(['auth'])->group(function(){
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
        Route::get('/category', [CategoryController::class, 'index'])->name('category');
        Route::post('/category', [CategoryController::class, 'create'])->name('create_category');
        Route::get('/category/{id}', [CategoryController::class, 'edit'])->name('edit_category');
        Route::put('/category/{id}', [CategoryController::class, 'update'])->name('update_category');
        Route::delete('/category/{id}', [CategoryController::class, 'delete'])->name('delete_category');
    Route::resource('barang', BarangController::class)->names('barang');
    Route::get('stokOutlet', [StokStandController::class, 'stok'])->name('stokOutlet');
    Route::resource('user', UserController::class)->names('user');
    Route::post('resetUser/{id}', [UserController::class, 'resetUser'])->name('resetUser');
    Route::get('logout', [LoginController::class, 'logout'])->name('logout');
    Route::resource('account', AccountController::class)->names('account');
    Route::resource('penjualan', PenjualanController::class)->names('penjualan');
    Route::get('reportPenjualan', [PenjualanController::class, 'admin'])->name('penjualanAdmin');
    Route::resource('stok', StokStandController::class)->names('stok');
    Route::get('action', [ActionController::class, 'index'])->name('action');
    Route::post('action/masuk', [ActionController::class, 'masuk'])->name('action_masuk');
    Route::post('action/keluar', [ActionController::class, 'keluar'])->name('action_keluar');
    Route::get('log', [ActionController::class, 'log'])->name('log');
    Route::get('logActivity', [ActionController::class, 'logAdmin'])->name('logAdmin');
    Route::resource('user/forgotPassword', ForgotPasswordController::class)->names('forgotPassword');
});

