<?php

use Illuminate\Support\Facades\Route;

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
    return view('home');
});

Route::get('/blog', function () {
    return view('blog');
});

Route::get('/contact', function () {
    return view('contact');
});

Route::get('/team', function () {
    return view('team');
});

Route::get('/register', function () {
    return view('register');
});

Route::get('/admins/create',function(){
    return view('admins.create');
});

Route::get('/barang/create',function(){
    return view('barangs.create');
});

Route::get('/barangs',function(){
    return view('barangs.index');
});

Route::get('/admins',function(){
    return view('admins.index');
});


Route::get('/admin/login',function(){
    return view('admins.login');
});

Route::get('/market/index',function(){
    return view('markets.index');
});

Route::get('/contacts/create',function(){
    return view('contacts.create');
});

Route::get('/contact',function(){
    return view('contact');
});

Route::get('/transaksi',function(){
    return view('pembelians.create');
});

Route::get('pesan/{id}', 'PesanController@index');

use App\Http\Controllers\OrderController;

Route::resource('orders', OrderController::class);
Route::get('api/orders', [OrderController::class, 'index'])->name('orders.index');
Route::get('/orders/create', [OrderController::class, 'create'])->name('orders.create');
Route::post('/orders', [OrderController::class, 'store'])->name('orders.store');
Route::get('/orders/{orders}', [OrderController::class, 'show'])->name('orders.show');
Route::get('/orders/{orders}/edit', [OrderController::class, 'edit'])->name('orders.edit');
Route::put('/orders/{orders}', [OrderController::class, 'update'])->name('orders.update');
Route::delete('/orders/{orders}', [OrderController::class, 'destroy'])->name('orders.destroy');

use App\Http\Controllers\PembayaranController;
Route::get('api/pembayarans', [PembayaranController::class, 'index'])->name('pembayarans.index');
Route::get('/pembayarans/create', [PembayaranController::class, 'create'])->name('pembayarans.create');
Route::post('/pembayarans', [PembayaranController::class, 'store'])->name('pembayarans.store');
Route::get('/pembayarans/{pembayarans}', [PembayaranController::class, 'show'])->name('pembayarans.show');
Route::get('/pembayarans/{pembayarans}/edit', [PembayaranController::class, 'edit'])->name('pembayarans.edit');
Route::put('/pembayarans/{pembayarans}', [PembayaranController::class, 'update'])->name('pembayarans.update');
Route::delete('/pembayarans/{pembayarans}', [PembayaranController::class, 'destroy'])->name('pembayarans.destroy');


    use App\Http\Controllers\BlogController;
    Route::get('/blog', [BlogController::class, 'index'])->name('blog.index');
    Route::get('/blog/blog', [BlogController::class, 'create'])->name('blog.create');
    Route::post('/blog', [BlogController::class, 'store'])->name('blog.store');
    Route::get('/blog/{blog}', [BlogController::class, 'show'])->name('blog.show');
    Route::get('/blog/{blog}/edit', [BlogController::class, 'edit'])->name('blog.edit');
    Route::put('/blog/{blog}', [BlogController::class, 'update'])->name('blog.update');
    Route::delete('/blog/{blog}', [BlogController::class, 'destroy'])->name('blog.destroy');
    Route::resource('blog', BlogController::class);
