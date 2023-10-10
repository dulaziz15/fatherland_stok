<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;

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
    return view('welcome');
});

Route::get('/category', [CategoryController::class, 'index']);
Route::post('/category', [CategoryController::class, 'create'])->name('create_category');

Auth::routes();

Route::middleware(['auth', 'user-access:user'])->group(function(){
    Route::get('/home', [HomeController::class, 'index'])->name('home');
});

Route::middleware(['auth', 'user-access:user'])->group(function(){
    Route::get('/admin/home', [HomeController::class, 'adminHome'])->name('admin.home');
});

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
