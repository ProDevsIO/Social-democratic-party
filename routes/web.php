<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/login', [App\Http\Controllers\Auth\LoginController::class, 'showlogin'])->name('login');
Route::post('/login', [App\Http\Controllers\Auth\LoginController::class, 'login']);
Route::post('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');

Route::middleware('auth')->group(function () {

    Route::get('/admin/dashboard', [App\Http\Controllers\Admin\AdminController::class, 'index'])->name('dashboard');
    Route::get('/admin/forms', [App\Http\Controllers\Admin\AdminController::class, 'view_forms'])->name('forms');
    Route::get('/admin/categories', [App\Http\Controllers\Admin\AdminController::class, 'view_categoriess'])->name('categories');
    Route::get('/admin/positions', [App\Http\Controllers\Admin\AdminController::class, 'view_positions'])->name('positions');

});


