<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AutomotiveController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\PropertyController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Site\FilterController;
use App\Http\Controllers\Site\SiteController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes();

Route::group(['middleware' => ['auth']], function () {
    Route::get('admin', [AdminController::class, 'index'])->name('admin.home');
    Route::prefix('admin')->name('admin.')->group(function () {
        /** Users */
        Route::get('/users/destroy/{id}', [UserController::class, 'destroy']);
        Route::resource('users', UserController::class);
        /** Properties */
        Route::get('/properties/destroy/{id}', [PropertyController::class, 'destroy']);
        Route::resource('properties', PropertyController::class);
        /** Automotives */
        Route::get('/automotives/destroy/{id}', [AutomotiveController::class, 'destroy']);
        Route::resource('automotives', AutomotiveController::class);
        /** Products */
        Route::get('/products/destroy/{id}', [ProductController::class, 'destroy']);
        Route::resource('products', ProductController::class);
    });
});

/** Web Routes */
/** Home */
Route::get('/', [SiteController::class, 'home'])->name('home');
/** About */
Route::get('/quem-somos', [SiteController::class, 'about'])->name('about');
/** Properties */
Route::get('/imoveis', [SiteController::class, 'properties'])->name('properties');
Route::get('/imovel/{slug}', [SiteController::class, 'property'])->name('property');
/** Automotives */
Route::get('/carros', [SiteController::class, 'automotives'])->name('automotives');
Route::get('/carros/{slug}', [SiteController::class, 'automotive'])->name('automotive');
/** Products */
Route::get('/produtos', [SiteController::class, 'products'])->name('products');
Route::get('/produtos/{slug}', [SiteController::class, 'product'])->name('product');
/** Contact */
Route::get('/contato', [SiteController::class, 'contact'])->name('contact');
Route::post('/contato/sendEmail', [SiteController::class, 'sendEmail'])->name('sendEmail');

/** Filter */
Route::match(['post', 'get'], '/filtro', [SiteController::class, 'filter'])->name('filter');
Route::namespace('Web')->name('component.main-filter.')->group(function () {
    Route::post('main-filter/word', [FilterController::class, 'word'])->name('word');
    Route::post('main-filter/type', [FilterController::class, 'type'])->name('type');
    Route::post('main-filter/city', [FilterController::class, 'city'])->name('city');
    Route::post('main-filter/bedrooms', [FilterController::class, 'bedrooms'])->name('bedrooms');
    Route::post('main-filter/garage', [FilterController::class, 'garage'])->name('garage');
    Route::post('main-filter/bathrooms', [FilterController::class, 'bathrooms'])->name('bathrooms');
    Route::post('main-filter/price', [FilterController::class, 'price'])->name('price');;
});
