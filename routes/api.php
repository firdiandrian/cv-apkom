<?php

use App\Http\Controllers\MarketController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\BlogController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/admin/login', [AdminController::class, 'showLoginForm'])->name('admin.login');
Route::post('/admin/login', [AdminController::class, 'login']);
Route::post('/admin/logout', [AdminController::class, 'logout'])->name('admins.logout');

    
    Route::get('admins/create', [AdminController::class, 'create'])->name('admins.create');
    Route::post('admins', [AdminController::class, 'store'])->name('admins.store');
    Route::get('api/admins', [AdminController::class, 'index'])->name('admins.index');
    Route::get('admins/edit/{id}', [AdminController::class, 'edit'])->name('admins.edit');
    Route::put('/admins/{id}', [AdminController::class, 'update'])->name('admins.update');
    Route::delete('admins/destroy/{id}', [AdminController::class, 'destroy'])->name('admins.destroy');
    
    Route::get('api/barangs', [BarangController::class, 'index'])->name('barangs.index');
    Route::get('/barangs/create', [BarangController::class, 'create'])->name('barangs.create');
    Route::post('/barangs', [BarangController::class, 'store'])->name('barangs.store');
    Route::get('/barangs/{barang}', [BarangController::class, 'show'])->name('barangs.show');
    Route::get('/barangs/{barang}/edit', [BarangController::class, 'edit'])->name('barangs.edit');
    Route::put('/barangs/{barang}', [BarangController::class, 'update'])->name('barangs.update');
    Route::delete('/barangs/{barang}', [BarangController::class, 'destroy'])->name('barangs.destroy');

    Route::get('contacts/create', [ContactController::class, 'create'])->name('contacts.create');
    Route::post('contacts', [ContactController::class, 'store'])->name('contacts.store');
    Route::get('api/contacts', [ContactController::class, 'index'])->name('contacts.index');
    Route::get('contacts/edit/{id}', [ContactController::class, 'edit'])->name('contacts.edit');
    Route::put('/contacts/{id}', [ContactController::class, 'update'])->name('contacts.update');
    Route::delete('contacts/destroy/{id}', [ContactController::class, 'destroy'])->name('contacts.destroy');

    Route::get('api/markets', [MarketController::class, 'index'])->name('markets.index');
    Route::get('/markets/create', [MarketController::class, 'create'])->name('markets.create');
    Route::post('/markets', [MarketController::class, 'store'])->name('markets.store');
    Route::get('/markets/{barang}', [MarketController::class, 'show'])->name('markets.show');
    Route::get('/markets/{barang}/edit', [MarketController::class, 'edit'])->name('markets.edit');
    Route::put('/markets/{barang}', [MarketController::class, 'update'])->name('markets.update');
    Route::delete('/markets/{barang}', [MarketController::class, 'destroy'])->name('markets.destroy');

    Route::get('api/pembayarans', [PembayaranController::class, 'index'])->name('pembayarans.index');
Route::get('/pembayarans/create', [PembayaranController::class, 'create'])->name('pembayarans.create');
Route::post('/pembayarans', [PembayaranController::class, 'store'])->name('pembayarans.store');
Route::get('/pembayarans/{pembayarans}', [PembayaranController::class, 'show'])->name('pembayarans.show');
Route::get('/pembayarans/{pembayarans}/edit', [PembayaranController::class, 'edit'])->name('pembayarans.edit');
Route::put('/pembayarans/{pembayarans}', [PembayaranController::class, 'update'])->name('pembayarans.update');
Route::delete('/pembayarans/{pembayarans}', [PembayaranController::class, 'destroy'])->name('pembayarans.destroy');


    Route::get('api/orders', [OrderController::class, 'index'])->name('orders.index');
    Route::get('/orders/create', [OrderController::class, 'create'])->name('orders.create');
    Route::post('/orders', [OrderController::class, 'store'])->name('orders.store');
    Route::get('/orders/{orders}', [OrderController::class, 'show'])->name('orders.show');
    Route::get('/orders/{orders}/edit', [OrderController::class, 'edit'])->name('orders.edit');
    Route::put('/orders/{orders}', [OrderController::class, 'update'])->name('orders.update');
    Route::delete('/orders/{orders}', [OrderController::class, 'destroy'])->name('orders.destroy');
    Route::resource('orders', OrderController::class);

    Route::get('/blog', [BlogController::class, 'index'])->name('blogs.index');
    Route::get('/blog/blog', [BlogController::class, 'create'])->name('blog.create');
    Route::post('/blog', [BlogController::class, 'store'])->name('blog.store');
    Route::get('/blog/{blog}', [BlogController::class, 'show'])->name('blog.show');
    Route::get('/blog/{blog}/edit', [BlogController::class, 'edit'])->name('blog.edit');
    Route::put('/blog/{blog}', [BlogController::class, 'update'])->name('blog.update');
    Route::delete('/blog/{blog}', [BlogController::class, 'destroy'])->name('blog.destroy');