<?php

use App\Http\Controllers\dashboardAdminController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', [MenuController::class, 'frontPage']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//membuat routing dengan auth pada halaman kategori dan halaman menu
Route::middleware(['auth'])->group(function () {
    Route::get('/index_kategori', [KategoriController::class, 'index']);
    Route::get('/create_kategori', [KategoriController::class, 'create']);
    Route::post('/index_kategori', [KategoriController::class, 'store']);
    Route::get('/edit_kategori/{id}', [KategoriController::class, 'edit']);
    Route::put('/index_kategori/{id}', [KategoriController::class, 'update']);
    Route::get('/delete_kategori/{id}', [KategoriController::class, 'destroy']);

    Route::get('/index_menu', [MenuController::class, 'index']);
    Route::get('/create_menu', [MenuController::class, 'create']);
    Route::post('/index_menu', [MenuController::class, 'store']);
    Route::get('/edit_menu/{id}', [MenuController::class, 'edit']);
    Route::put('/index_menu/{id}', [MenuController::class, 'update']);
    Route::get('/delete_menu/{id}', [MenuController::class, 'destroy']);
    
    Route::get('/dashboardAdmin', [dashboardAdminController::class, 'index']);
    Route::post('/dashboardAdmin', [dashboardAdminController::class, 'store']);
});

//membuat routing dengan auth owner pada halaman user
Route::middleware(['auth', 'owner'])->group(function () {
    Route::get('/index_user', [UserController::class, 'index']);
    Route::get('/create_user', [UserController::class, 'create']);
    Route::post('/index_user', [UserController::class, 'store']);
    Route::get('/edit_user/{id}', [UserController::class, 'edit']);
    Route::put('/index_user/{id}', [UserController::class, 'update']);
    Route::get('/delete_user/{id}', [UserController::class, 'destroy']);
});