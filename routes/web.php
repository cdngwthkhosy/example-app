<?php

use App\Http\Controllers\AdminMutabaahController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MutabaahController;
use App\Http\Controllers\UserController;
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

Route::redirect('/', '/login');
Route::get('/login', [AuthController::class, 'index'])->name('login');
// Route::post('/login', [AuthController::class, 'store'])->name('post.login');
// Google Login
Route::get('login-google', [AuthController::class, 'google'])->name('login.google');
Route::get('auth/google/callback', [AuthController::class, 'handleProviderCallback'])->name('login.google.callback');

Route::post('/logout', [AuthController::class, 'destroy'])->middleware('auth')->name('logout');

Route::middleware('auth')->prefix('dashboard')->group(function() {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
});

Route::middleware('auth', 'role:pendidik|tenaga-kependidikan|staff')->prefix('user')->name('user.')->group(function () {
    Route::get('/evaluation/mutabaah', [MutabaahController::class, 'index'])->name('evaluation.mutabaah');
    Route::post('/evaluation/mutabaah', [MutabaahController::class, 'store'])->name('evaluation.mutabaah.store');

    Route::get('/report/mutabaah', [MutabaahController::class, 'show'])->name('report.mutabaah');
});

Route::middleware('auth', 'role:super-admin')->prefix('admin')->name('admin.')->group(function () {
    // MANAJEMEN USER
    Route::get('/manajemen/user', [UserController::class, 'index'])->name('manajemen.user');
    Route::get('/manajemen/user/delete/{id}', [UserController::class, 'destroy'])->name('manajemen.user.destroy');
    Route::get('/manajemen/user/create', [UserController::class, 'create'])->name('manajemen.user.create');
    Route::post('/manajemen/user/store', [UserController::class, 'store'])->name('manajemen.user.store');
    Route::get('/manajemen/user/edit/{id}', [UserController::class, 'edit'])->name('manajemen.user.edit');
    Route::post('/manajemen/user/update/{id}', [UserController::class, 'update'])->name('manajemen.user.update');

    // MANAJEMEN MUTABAAH
    Route::get('/manajemen/mutabaah', [AdminMutabaahController::class, 'index'])->name('manajemen.mutabaah');
    Route::post('/manajemen/mutabaah/show', [AdminMutabaahController::class, 'show'])->name('manajemen.mutabaah.show');

    // MANAJEMEN ROLE
    
});

