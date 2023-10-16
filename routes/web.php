<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\LoginController;

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
Route::get('/', function () {
    return view('pages.dashboard');
})->name('dashboard');

Route::get('/category', [CategoryController::class, 'index'])->name('category');
Route::post('/category', [CategoryController::class, 'create'])->name('create_category');
Route::get('/category/{id}', [CategoryController::class, 'edit'])->name('edit_category');
Route::put('/category/{id}', [CategoryController::class, 'update'])->name('update_category');
Route::delete('/category/{id}', [CategoryController::class, 'delete'])->name('delete_category');
Route::resource('barang', BarangController::class)->names('barang');

