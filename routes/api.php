<?php

use App\Http\Controllers\Api;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::prefix('/api/v1')->group(function () {

    Route::middleware('auth:api')->group(function () {

        Route::get('/profile', [Api\ProfileController::class, 'index'])->name('profile.index');

    });

});



