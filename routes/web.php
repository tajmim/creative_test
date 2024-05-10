<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\FeatureController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProfilePicController;

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

Auth::routes();

Route::get('/profile', [HomeController::class, 'index'])->name('profile');

// Route::get('/products', [HomeController::class, 'products'])->name('products');
Route::post('/store/profilepicture', [ProfilePicController::class, 'store'])->name('store.profilepicture');


Route::get('/view_category', [ProductController::class, 'view'])->name('view.category');
Route::post('/add_category', [ProductController::class, 'stores'])->name('stores.category');
Route::resource('products', ProductController::class);
Route::resource('features', FeatureController::class);
