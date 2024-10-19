<?php

use App\Http\Controllers\UserController;

use Illuminate\Support\Facades\Route;

use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('index');
});

Auth::routes();
//view redirect admin
Route::get('/order', [App\Http\Controllers\HomeController::class, 'order'])->name('order');

Route::get('/admin', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/users', [App\Http\Controllers\HomeController::class, 'index'])->name('users');

Route::get('/adduser', [App\Http\Controllers\HomeController::class, 'adduser'])->name('adduser');

Route::get('/userlist', [App\Http\Controllers\HomeController::class, 'userlist'])->name('userlist');

Route::get('/addCategory', [App\Http\Controllers\HomeController::class, 'addCategory'])->name('addCategory');

Route::get('/categories', [App\Http\Controllers\HomeController::class, 'categorieslist'])->name('categorieslist');

Route::get('/items', [App\Http\Controllers\HomeController::class, 'items'])->name('items');

Route::get('/additem', [App\Http\Controllers\HomeController::class, 'additem'])->name('additem');

Route::get('/books', [App\Http\Controllers\HomeController::class, 'booklist'])->name('booklist');

Route::POST('/viewbook', [App\Http\Controllers\HomeController::class, 'search'])->name('search');



// web site //
Route::get('/home', [App\Http\Controllers\HomeController::class, 'home'])->name('index');
Route::get('/booktable', [App\Http\Controllers\HomeController::class, 'booktable'])->name('booktable');
Route::get('/menu', [App\Http\Controllers\HomeController::class, 'menu'])->name('menu');
Route::get('/about', [App\Http\Controllers\HomeController::class, 'about'])->name('about');
Route::get('/cart', [App\Http\Controllers\CartController::class, 'index'])->name('card');

//store data
Route::POST('/adduser/store', [App\Http\Controllers\UserController::class, 'store'])->name('storeadduser');
Route::POST('/addCategory/store', [App\Http\Controllers\TagController::class, 'store'])->name('storetag');
Route::POST('/additem/store', [App\Http\Controllers\ItemController::class, 'store'])->name('storeitem');
Route::POST('book/store', [App\Http\Controllers\BookController::class, 'store'])->name('storebook');
Route::POST('cart/add', [App\Http\Controllers\CartController::class, 'addToCart'])->name('cart.add');


//edit
Route::GET('/users/{user}/edit',[App\Http\Controllers\UserController::class, 'edit'])->name('user.edit');
Route::GET('/categories/editCategory', [App\Http\Controllers\TagController::class, 'edit'])->name('tag.edit');



//update
Route::PUT('/users/{id}/update',[App\Http\Controllers\UserController::class, 'Update'])->name('user.update');
Route::put('cart/update/{itemId}', [App\Http\Controllers\CartController::class, 'update'])->name('cart.update');





//destroy
Route::delete('cart/remove/{itemId}', [App\Http\Controllers\CartController::class, 'destroy'])->name('cart.destroy');
