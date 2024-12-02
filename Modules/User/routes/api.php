<?php

use Illuminate\Support\Facades\Route;
use Modules\User\Http\Controllers\AuthUserController;
use Modules\User\Http\Controllers\PasswordResetController;
use Modules\User\Http\Controllers\UserController;

/*
 *--------------------------------------------------------------------------
 * API Routes
 *--------------------------------------------------------------------------
 *
 * Here is where you can register API routes for your application. These
 * routes are loaded by the RouteServiceProvider within a group which
 * is assigned the "api" middleware group. Enjoy building your API!
 *
*/

Route::middleware(['guest'])->prefix('user')->group(function () {
    Route::post('register', [UserController::class, 'store'])->name('user.register');
    Route::post('sign-in', [AuthUserController::class, 'signIn'])->middleware(['throttle:6,1'])->name('user.sign-in');
    Route::post('recover-password', [PasswordResetController::class, 'sendLink'])->middleware(['throttle:6,1'])->name('user.recover-password');
});

Route::middleware(['auth:sanctum'])->prefix('user')->group(function () {

});
