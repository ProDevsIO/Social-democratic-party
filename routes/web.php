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
Route::get('/form', [App\Http\Controllers\Forms\FormController::class, 'showForm'])->name('form');


Route::get('/form/fill/category/{form_id}', [App\Http\Controllers\Forms\FormController::class, 'get_categories_for_form']);
Route::get('/form/fill/position/{form_id}/{category_id}', [App\Http\Controllers\Forms\FormController::class, 'get_positions_for_form']);

Route::post('/form/fill/submit', [App\Http\Controllers\App_form\ApplicationController::class, 'post_form']);
Route::get('/application/payment/confirmation', [App\Http\Controllers\App_form\ApplicationController::class, 'payment_confirmation']);
Route::get('/form/failed', [App\Http\Controllers\App_form\ApplicationController::class, 'failed_form']);
Route::get('/form/success', [App\Http\Controllers\App_form\ApplicationController::class, 'success_form']);
Route::get('/teflon/card-details', [App\Http\Controllers\App_form\ApplicationController::class, 'view_teflon_card_form']);
Route::get('/teflon/bank-transfer/details', [App\Http\Controllers\App_form\ApplicationController::class, 'view_tarnsfer_details']);
Route::post('/teflon/accept/payment', [App\Http\Controllers\App_form\ApplicationController::class, 'post_teflon_payment']);
Route::get('/charges/successful', [App\Http\Controllers\App_form\ApplicationController::class, 'teflon_success_callback']);


Route::get('/test/api', [App\Http\Controllers\App_form\ApplicationController::class, 'test']);

Route::middleware('auth')->group(function () {

    Route::get('/admin/dashboard', [App\Http\Controllers\Admin\AdminController::class, 'index'])->name('dashboard');
    Route::get('/admin/forms', [App\Http\Controllers\Admin\AdminController::class, 'view_forms'])->name('forms');
    Route::get('/admin/form/position/view/{id}', [App\Http\Controllers\Admin\AdminController::class, 'view_form_positions'])->name('form_postion');
    Route::get('/admin/categories', [App\Http\Controllers\Admin\AdminController::class, 'view_categories'])->name('categories');
    Route::get('/admin/positions', [App\Http\Controllers\Admin\AdminController::class, 'view_positions'])->name('positions');

    Route::post('/admin/form/add', [App\Http\Controllers\Admin\AdminController::class, 'add_forms'])->name('add_forms');
    Route::post('/admin/form/position/add/{id}', [App\Http\Controllers\Admin\AdminController::class, 'add_form_positions'])->name('add_form_postion');

    Route::post('/admin/category/add', [App\Http\Controllers\Admin\AdminController::class, 'add_categories'])->name('add_categories');

    Route::post('/admin/position/add', [App\Http\Controllers\Admin\AdminController::class, 'add_positions'])->name('add_positions');

    Route::get('/admin/application/paid', [App\Http\Controllers\Admin\ApplicationController::class, 'view_paid_application'])->name('paid_application');
    Route::get('/admin/application/unpaid', [App\Http\Controllers\Admin\ApplicationController::class, 'view_unpaid_application'])->name('unpaid_application');
    Route::get('/admin/application/single/{id}', [App\Http\Controllers\Admin\ApplicationController::class, 'view_single_application'])->name('single_application');
   

});


