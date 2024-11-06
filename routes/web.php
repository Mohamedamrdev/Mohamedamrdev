<?php

use App\Http\Controllers\UserController;

use Illuminate\Support\Facades\Route;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\PaymentController;
use App\Http\Middleware\CheckPermission;

Route::get('/', function () {
    return view('index');
});

Auth::routes();

Route::middleware(['auth', CheckPermission::class.':admin'])->group(function () {
    // Routes الخاصة بالـ admin فقط
    Route::get('/order', [App\Http\Controllers\HomeController::class, 'order'])->name('order');
    Route::get('/admin', [App\Http\Controllers\HomeController::class, 'admin'])->name('home');
    Route::get('/users', [App\Http\Controllers\HomeController::class, 'index'])->name('users');
    Route::get('/adduser', [App\Http\Controllers\HomeController::class, 'adduser'])->name('adduser');
    Route::get('/userlist', [App\Http\Controllers\HomeController::class, 'userlist'])->name('userlist');
    Route::get('/addCategory', [App\Http\Controllers\HomeController::class, 'addCategory'])->name('addCategory');
    Route::get('/categories', [App\Http\Controllers\HomeController::class, 'categorieslist'])->name('categorieslist');
    Route::get('/items', [App\Http\Controllers\HomeController::class, 'items'])->name('items');
    Route::get('/additem', [App\Http\Controllers\HomeController::class, 'additem'])->name('additem');
    Route::get('/books', [App\Http\Controllers\HomeController::class, 'booklist'])->name('booklist');
    Route::post('/viewbook', [App\Http\Controllers\HomeController::class, 'search'])->name('search');
    Route::get('/orders', [App\Http\Controllers\OrderController::class, 'index'])->name('orderlist');
});

// web site //
Route::get('/profile', [App\Http\Controllers\HomeController::class, 'profile'])->name('profile');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'home'])->name('index');
Route::get('/booktable', [App\Http\Controllers\HomeController::class, 'booktable'])->name('booktable');
Route::get('/menu', [App\Http\Controllers\HomeController::class, 'menu'])->name('menu');
Route::get('/about', [App\Http\Controllers\HomeController::class, 'about'])->name('about');
Route::get('/cart', [App\Http\Controllers\CartController::class, 'index'])->name('cart');
Route::get('/success/{id}', [App\Http\Controllers\OrderController::class, 'success'])->name('success');

//store data
Route::POST('/adduser/store', [App\Http\Controllers\UserController::class, 'store'])->name('storeadduser');
Route::POST('/addCategory/store', [App\Http\Controllers\TagController::class, 'store'])->name('storetag');
Route::POST('/additem/store', [App\Http\Controllers\ItemController::class, 'store'])->name('storeitem');
Route::POST('book/store', [App\Http\Controllers\BookController::class, 'store'])->name('storebook');
Route::POST('cart/add', [App\Http\Controllers\CartController::class, 'addToCart'])->name('cart.add');
Route::POST('order/store', [App\Http\Controllers\OrderController::class, 'store'])->name('order.store');

//edit
Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('user.edit');
Route::GET('/categories/editCategory/{id}', [App\Http\Controllers\TagController::class, 'edit'])->name('tag.edit');
Route::GET('/items/edititem/{id}', [App\Http\Controllers\ItemController::class, 'edit'])->name('item.edit');

//update
Route::put('/users/{user}/update', [UserController::class, 'update'])->name('user.update');
Route::post('cart/update/{Id}', [App\Http\Controllers\CartController::class, 'updateCart'])->name('cart.update');
Route::PUT('/categories/editCategory/{id}', [App\Http\Controllers\TagController::class, 'update'])->name('tag.update');
Route::PUT('/items/edititem/{id}', [App\Http\Controllers\ItemController::class, 'update'])->name('item.update');

//destroy
Route::delete('/cart/remove/{id}', [App\Http\Controllers\CartController::class, 'removeFromCart'])->name('cart.remove');
Route::delete('/items/{id}', [App\Http\Controllers\ItemController::class, 'destroy'])->name('item.destroy');

//api
Route::get('/payment', [PaymentController::class, 'showPaymentForm'])->name('payment.form');
Route::post('/payment/process', [PaymentController::class, 'processPayment'])->name('payment.process');
