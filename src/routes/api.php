<?php

use App\Http\Controllers\Api\OrderTypeController;
use App\Http\Controllers\Api\PartnershipController;
use App\Http\Controllers\Api\WorkerController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\OrderController;

Route::apiResource('users', UserController::class);

Route::apiResource('orders', OrderController::class);

Route::apiResource('ordertypes', OrderTypeController::class);

Route::apiResource('partnerships', PartnershipController::class);

Route::apiResource('workers', WorkerController::class);
