<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ListingController;
use App\Http\Controllers\UserListingController;
use Illuminate\Support\Facades\Route;


Route::get('/', [HomeController::class, 'index'])->name('home');



Route::resource('/listings', ListingController::class)
    ->except(['show', 'index'])
    ->middleware('auth');

Route::get('/listings/{listing:slug}', [ListingController::class, 'show'])
    ->name('listings.show');

Route::match(['get', 'post'], '/register', [AuthController::class, 'register'])
    ->name('register')->middleware('guest');

Route::match(['get', 'post'], '/login', [AuthController::class, 'login'])
    ->name('login')->middleware('guest');

Route::get('/logout', [AuthController::class, 'logout'])
    ->name('logout')->middleware('auth');

Route::get('/my-listings', [UserListingController::class, 'index'])
    ->name('listings.user')
    ->middleware('auth');
