<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;

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


Route::get('/', [App\Http\Controllers\PublicController::class, 'index'])->name('index');
Route::get('/about', [App\Http\Controllers\PublicController::class, 'about'])->name('about');
Route::get('/booking', [App\Http\Controllers\PublicController::class, 'booking'])->name('booking');
Route::get('/contact', [App\Http\Controllers\PublicController::class, 'contact'])->name('contact');
Route::post('/contact/message', [App\Http\Controllers\PublicController::class, 'addMessageContact'])->name('contact.add.message');

Route::get('/service', [App\Http\Controllers\PublicController::class, 'service'])->name('service');
Route::post('/service/demande', [App\Http\Controllers\PublicController::class, 'serviceAdd'])->name('service.add.demande');
Route::get('/team', [App\Http\Controllers\PublicController::class, 'team'])->name('team');
Route::get('/menu', [App\Http\Controllers\PublicController::class, 'menu'])->name('menu');
Route::get('/testimonial', [App\Http\Controllers\PublicController::class, 'menu'])->name('testimonial');
Route::get('/panier', [App\Http\Controllers\PublicController::class, 'panier'])->name('panier');
Route::get('/add/basket/{id}', [App\Http\Controllers\PublicController::class, 'addToBasket'])->name('add.basket');
Route::get('/update/basket/{id}/{qty}', [App\Http\Controllers\PublicController::class, 'updateBasket'])->name('update.basket');
Route::post('/newletter', [App\Http\Controllers\PublicController::class, 'newletter'])->name('newletter');
Route::get('/checkout', [App\Http\Controllers\PublicController::class, 'checkout'])->name('checkout');
Route::post('/checkout/stripe', [App\Http\Controllers\StripeController::class, 'checkout'])->name('checkout.stripe');
Route::get('/success', [App\Http\Controllers\StripeController::class, 'success'])->name('success');


Route::get('/test', [App\Http\Controllers\HomeController::class, 'test']);


Route::get('/error', [App\Http\Controllers\Auth\LoginController::class, 'unauthorized'])->name('unauthorized');

Auth::routes();

Route::group(['middleware' => 'auth'], function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::group(['middleware' => 'is_manager'], function () {
        Route::prefix('orders')->group(function () {
            Route::get('/', [OrderController::class, 'index'])->name('orders.index');
            Route::get('/fetch', [OrderController::class, 'fetch'])->name('orders.fetch');
            Route::get('/create', [OrderController::class, 'create'])->name('orders.create');
            Route::get('/edit/{visite}', [OrderController::class, 'edit'])->name('orders.edit');
            Route::post('/store', [OrderController::class, 'store'])->name('orders.store');
            Route::post('/update/{visite}', [OrderController::class, 'update'])->name('orders.update');
            Route::get('/delete/{visite}', [OrderController::class, 'destroy'])->name('orders.delete');

            Route::get('/traiteur', [OrderController::class, 'traiteur'])->name('orders.traiteur');
            Route::get('/traiteur/fetch', [OrderController::class, 'fetchTraiteur'])->name('orders.traiteur.fetch');
        });

        Route::prefix('products')->group(function () {
            Route::get('/', [ProductController::class, 'index'])->name('products.index');
            Route::get('/fetch', [ProductController::class, 'fetch'])->name('products.fetch');
            Route::get('/create', [ProductController::class, 'create'])->name('products.create');
            Route::get('/edit/{visite}', [ProductController::class, 'edit'])->name('products.edit');
            Route::post('/store', [ProductController::class, 'store'])->name('products.store');
            Route::post('/update/{visite}', [ProductController::class, 'update'])->name('products.update');
            Route::get('/delete/{visite}', [ProductController::class, 'destroy'])->name('products.delete');
        });

        Route::prefix('categories')->group(function () {
            Route::get('/', [CategoryController::class, 'index'])->name('categories.index');
            Route::get('/fetch', [CategoryController::class, 'fetch'])->name('categories.fetch');
            Route::get('/create', [CategoryController::class, 'create'])->name('categories.create');
            Route::get('/edit/{visite}', [CategoryController::class, 'edit'])->name('categories.edit');
            Route::post('/store', [CategoryController::class, 'store'])->name('categories.store');
            Route::post('/update/{visite}', [CategoryController::class, 'update'])->name('categories.update');
            Route::get('/delete/{visite}', [CategoryController::class, 'destroy'])->name('categories.delete');
        });

        Route::prefix('users')->group(function () {
            Route::get('/', [UserController::class, 'index'])->name('users.index');
            Route::get('/fetch', [UserController::class, 'fetch'])->name('users.fetch');
            Route::get('/create', [UserController::class, 'create'])->name('users.create');
            Route::get('/edit/{id}', [UserController::class, 'edit'])->name('users.edit');
            Route::post('/store', [UserController::class, 'store'])->name('users.store');
            Route::post('/update/{id}', [UserController::class, 'update'])->name('users.update');
            Route::get('/delete/{id}', [UserController::class, 'destroy'])->name('users.delete');
        });


    });



});
