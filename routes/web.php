<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\BookController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\FrontBookController;


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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::resource('front-book', FrontBookController::class);
// user login
// Route::middleware(['auth'])->group(function () {
//   Cart
  Route::resource('cart', CartController::class);
  Route::post('addtocart/{id}',[CartController::class,'addToCart']);
// });

// Admin
// Route::prefix('admin')->middleware('auth','role')->name('admin.')->group(function () {
    // Route::get('dashboard', function () {
    //     return view('admin.dashboard');
    // });
    Route ::resource('category',CategoryController::class);
    Route ::resource('book',BookController::class);
    Route ::resource('blog',BlogController::class);

// });
require __DIR__.'/auth.php';
