<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DetailController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DashboardProductController;
use App\Http\Controllers\DashboardTransactionController;
use App\Http\Controllers\DashboardSettingController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\AdminCategoryController;
use App\Http\Controllers\Admin\AdminUserController;
use App\Http\Controllers\Admin\AdminProductController;
use App\Http\Controllers\Admin\AdminProductGalleryController;

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

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/categories', [CategoryController::class, 'index'])->name('categories');
Route::get('/categories/{id}', [CategoryController::class, 'detail']);

Route::get('/details/{id}', [DetailController::class, 'index'])->name('detail');
Route::post('/details/{id}', [DetailController::class, 'add'])->name('detail-add');



Route::get('/success', [CartController::class, 'success'])->name('success');

Route::get('/register/success', [RegisterController::class, 'success'])->name('register-success');



Route::get('/dashboard/products', [DashboardProductController::class, 'index'])->name('dashboard-products');
Route::get('/dashboard/products/create', [DashboardProductController::class, 'create'])->name('dashboard-products-create');
Route::get('/dashboard/products/{id}', [DashboardProductController::class, 'details'])->name('dashboard-products-details');

Route::get('/dashboard/transactions', [DashboardTransactionController::class, 'index'])->name('dashboard-transactions');
Route::get('/dashboard/transactions/{id}', [DashboardTransactionController::class, 'details'])->name('dashboard-transactions-details');

Route::get('/dashboard/settings', [DashboardSettingController::class, 'store'])->name('dashboard-settings-store');
Route::get('/dashboard/account', [DashboardSettingController::class, 'account'])->name('dashboard-settings-account');

Route::group(['middleware' => ['auth']], function(){
    Route::get('/cart', [CartController::class, 'index'])->name('cart');
    Route::delete('/cart/{id}', [CartController::class, 'delete'])->name('cart-delete');

    Route::post('/checkout', [CheckoutController::class, 'process'])->name('checkout');
    Route::post('/checkout/callback', [CheckoutController::class, 'callback'])->name('midtrans-callback');

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
});

//Route::prefix('admin')
//    ->namespace('Admin')
//    ->middleware(['auth','admin'])
//    ->group(function(){
//        Route::get('/', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
//        Route::resource('category', AdminCategoryController::class);
//        Route::resource('user', AdminUserController::class);
//        Route::resource('product', AdminProductController::class);
//        Route::resource('gallery', AdminProductGalleryController::class);
////     Route::get('category', [AdminCategoryController::class, 'index'])->name('admin.category');
//});

Route::prefix('admin')
    ->middleware(['auth','admin'])
    ->group(function(){
        Route::get('/', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
        Route::resource('category', AdminCategoryController::class);
        Route::resource('user', AdminUserController::class);
        Route::resource('product', AdminProductController::class);
        Route::resource('gallery', AdminProductGalleryController::class);
    });

Auth::routes();
