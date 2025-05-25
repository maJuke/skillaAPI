<?php

use App\Http\Controllers\Api\OrderTypeController;
use App\Http\Controllers\Api\PartnershipController;
use App\Http\Controllers\Api\PassportAuthController;
use App\Http\Controllers\Api\WorkerController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\OrderController;

Route::apiResource('users', UserController::class);

Route::apiResource('orders', OrderController::class);

Route::apiResource('ordertypes', OrderTypeController::class);

Route::apiResource('partnerships', PartnershipController::class);

Route::post('workers/assign-worker-to-order', [WorkerController::class, 'assignWorkerToOrder']);
Route::get('workers/available-for-order-types', [WorkerController::class, 'workersForExactOrderTypes']);
Route::apiResource('workers', WorkerController::class);

Route::prefix('passport')->group(function () {
    Route::post('token', [PassportAuthController::class, 'tokenByUserId']);
    Route::post('token/refresh', [PassportAuthController::class, 'refresh']);
    Route::get('tokens', [PassportAuthController::class, 'tokens'])
        ->middleware('auth:api');
    Route::delete('tokens/{token_id}', [PassportAuthController::class, 'revokeToken'])
        ->middleware('auth:api');
    Route::get('clients', [PassportAuthController::class, 'clients'])
        ->middleware('auth:api');
    Route::post('clients', [PassportAuthController::class, 'createClient'])
        ->middleware('auth:api');
    Route::put('clients/{client_id}', [PassportAuthController::class, 'updateClient'])
        ->middleware('auth:api');
    Route::delete('clients/{client_id}', [PassportAuthController::class, 'deleteClient'])
        ->middleware('auth:api');
    Route::get('scopes', [PassportAuthController::class, 'scopes'])
        ->middleware('auth:api');
    Route::get('personal-access-tokens', [PassportAuthController::class, 'personalAccessTokens'])
        ->middleware('auth:api');
    Route::post('personal-access-tokens', [PassportAuthController::class, 'createPersonalAccessToken'])
        ->middleware('auth:api');
    Route::delete('personal-access-tokens/{token_id}', [PassportAuthController::class, 'revokePersonalAccessToken'])
        ->middleware('auth:api');
    Route::get('sessions', [PassportAuthController::class, 'sessions'])
        ->middleware('auth:api');
    Route::delete('sessions/{token_id}', [PassportAuthController::class, 'revokeSession'])
        ->middleware('auth:api');
});
