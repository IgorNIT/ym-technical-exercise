<?php

use Illuminate\Support\Facades\Route;
use Modules\Company\Http\Controllers\UserCompanyController;

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

Route::middleware(['auth:sanctum'])->prefix('user')->group(function () {
    Route::get('companies', [UserCompanyController::class, 'index'])->name('user.company.index');
    Route::post('company', [UserCompanyController::class, 'store'])->name('user.company.store');
});
