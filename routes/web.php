<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AutomotiveController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\PropertyController;
use App\Http\Controllers\Admin\UserController;
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
Route::get('/', [SiteController::class, 'home'])->name('home');
Route::get('/quem-somos', [SiteController::class, 'about'])->name('about');
Route::get('/imoveis', [SiteController::class, 'properties'])->name('properties');
Route::get('/imovel/{slug}', [SiteController::class, 'property'])->name('property');
Route::get('/contato', [SiteController::class, 'contact'])->name('contact');
