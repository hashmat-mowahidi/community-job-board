<?php

use App\Http\Controllers\Api\UserListingController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user/listings', [UserListingController::class, 'index'])
    ->middleware('auth:sanctum')->name('api.user.listing');
