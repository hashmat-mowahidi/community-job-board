<?php

use App\Http\Controllers\Api\UserListingController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user/listing', [UserListingController::class, 'index'])
    ->middleware('auth:sanctum')->name('api.user.listing');
