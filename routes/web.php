<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\LogoutController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
//-----------------start of login----------------

Route::get('/login',[LoginController::class,'index'])->name('login');
Route::post('/login',[LoginController::class,'save'])->name('auth.login');

//-----------------end of login----------------
Route::get('/logout',[LogoutController::class,'logout_system']);

// Admin Routes (for managing categories and questions)
Route::prefix('admin')->group(function () {
    // Categories Management

    Route::get('categories/create', [CategoryController::class, 'create'])
        ->name('categories.create');
    Route::post('categories', [CategoryController::class, 'store'])
        ->name('categories.store');

});

// Client Routes (for adding and editing products)
Route::prefix('products')->group(function () {
    // Products Management
    Route::get('create', [ProductController::class, 'create'])
        ->name('products.create');
    Route::post('/', [ProductController::class, 'store'])
        ->name('products.store');

});
