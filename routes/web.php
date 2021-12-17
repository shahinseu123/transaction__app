<?php

use App\Http\Controllers\auth\LoginController;
use App\Http\Controllers\auth\RegisterController;
use App\Http\Controllers\back\DashboardController;
use App\Http\Controllers\back\ParticularController;
use App\Http\Controllers\back\ReportController;
use App\Http\Controllers\back\UserController;
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

Route::get('/', [LoginController::class, 'login_page'])->name('login');
Route::post('/login/action', [LoginController::class, 'login_action'])->name('login.action');
Route::get('/register', [RegisterController::class, 'register_page'])->name('register');
Route::post('/register/action', [RegisterController::class, 'register_action'])->name('register.action');

Route::prefix('admin')->middleware('auth')->group(function () {
    Route::get('/transaction', [DashboardController::class, 'index'])->name('admin.transaction');
    Route::get('/transaction/add', [DashboardController::class, 'add_tran'])->name('transaction.add');
    Route::get('/transaction/delete/{id}', [DashboardController::class, 'delete_trans'])->name('transaction.delete');

    Route::get('/transaction/edit/{id}', [DashboardController::class, 'edit_transaction'])->name('transaction.edit');
    Route::post('/transaction/add/action', [DashboardController::class, 'create_transaction'])->name('transaction.action');
    Route::post('/transaction/update/action', [DashboardController::class, 'update_transaction'])->name('transaction.update');
    Route::get('/particular', [ParticularController::class, 'index'])->name('admin.particular');
    Route::post('/particular/add', [ParticularController::class, 'add_particular'])->name('particular.action');
    Route::get('/particular/delete/{id}', [ParticularController::class, 'delete_particular'])->name('particular.delete');
    Route::get('/report', [ReportController::class, 'index'])->name('admin.report');
    Route::get('/users', [UserController::class, 'index'])->name('admin.user');
    Route::get('/users/delete/{id}', [UserController::class, 'delete_user'])->name('user.delete');
    Route::get('/users/make/admin/{id}', [UserController::class, 'make_admin'])->name('user.make.admin');
    Route::get('/users/make/user/{id}', [UserController::class, 'make_user'])->name('user.make.user');
});
