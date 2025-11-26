<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;


Route::get('/', function () {
    return view('home');
});

Route::get('/home', function () {
    return view('home');
});

Route::get('/about-us', function () {
    return view('about-us');
});

Route::get('/liste-produit', function () {
    return view('liste-produit');
});

Route::get('/faq', function () {
    return view('faq');
});

Route::get('/panier', function () {
    return view('panier');
});

Route::get('/page-favoris', function () {
    return view('page-favoris');
});

Route::get('/page-favoris', function () {
    return view('page-favoris');
});

Route::get('/product-form', function () {
    return view('product-form');
});
Route::get('/',[ProductController::class, 'index'])->name('home');
Route::resource('products', ProductController::class);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

// Dashboard client
Route::get('/dashboard', function () {
    return redirect('/home');
})
    ->middleware('auth')
    ->name('dashboard');

// Dashboard admin
Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
});