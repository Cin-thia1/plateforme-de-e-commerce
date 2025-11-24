<?php

use App\Http\Controllers\ProfileController;
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

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');