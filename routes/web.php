<?php

use App\Http\Controllers\AddressController;
use App\Http\Controllers\AddressOptionsController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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

// Route::get('/', function () {
//     return Inertia::render('Welcome', [
//         'canLogin' => Route::has('login'),
//         'canRegister' => Route::has('register'),
//         'laravelVersion' => Application::VERSION,
//         'phpVersion' => PHP_VERSION,
//     ]);
// });

Route::get('/', function () { return Inertia::render('Dashboard'); })->name('dashboard');
Route::get('/cart', function () { return Inertia::render('Cart'); })->name('cart.index');
Route::get('/category/{id}', [CategoryController::class, 'index'])->name('category.index');
Route::get('/product/{id}', [ProductController::class, 'index'])->name('product.index');
Route::get('/address', [AddressController::class, 'index'])->name('address.index');

Route::middleware('auth')->group(function () {
    Route::get('/address_options', [AddressOptionsController::class, 'index'])->name('address_options.index');
    Route::post('/address_options', [AddressOptionsController::class, 'store'])->name('address_options.store');
    Route::delete('/address_options/{id}', [AddressOptionsController::class, 'destroy'])->name('address_options.destroy');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout.index');
    Route::post('/checkout', [CheckoutController::class, 'store'])->name('checkout.store');
    Route::put('/checkout', [CheckoutController::class, 'update'])->name('checkout.update');

    Route::get('/checkout_success', function () { return Inertia::render('CheckoutSuccess'); })->name('checkout_success.index');
});

require __DIR__.'/auth.php';
