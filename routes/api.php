<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LogController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\TimeController;

Route::group([
    'middleware' => 'api',
], function() {
    Route::group([
        'prefix' => 'auth',
    ], function() {
        Route::post('/register', [AuthController::class, 'register']);
        Route::put('/login', [AuthController::class, 'login']);
        Route::put('/revival', [AuthController::class, 'revival']);
        Route::delete('/{id}/logout', [AuthController::class, 'logout']);
        Route::delete('/{id}/unregister', [AuthController::class, 'unregister']);
    });
    Route::group([
        'prefix' => 'users',
    ], function() {
        Route::get('/', [UserController::class, 'names']);
        Route::get('/{id}', [UserController::class, 'info']);
        Route::put('/{id}', [UserController::class, 'update']);
    });
    Route::group([
        'prefix' => 'user/{userId}/logs',
    ], function() {
        Route::get('/', [LogController::class, 'logs']);
        Route::post('/create', [LogController::class, 'create']);
        Route::get('/output', [LogController::class, 'output']);
        Route::delete('/{logId}', [LogController::class, 'delete']);
    });
    Route::group([
        'prefix' => 'user/{userId}/menus',
    ], function() {
        Route::get('/', [MenuController::class, 'menus']);
        Route::post('/create', [MenuController::class, 'create']);
        Route::put('/{menuId}', [MenuController::class, 'update']);
        Route::delete('/{menuId}', [MenuController::class, 'delete']);
    });
    Route::group([
        'prefix' => 'user/{userId}/times',
    ], function() {
        Route::get('/', [TimeController::class, 'times']);
        Route::put('/', [TimeController::class, 'update']);
    });
});
