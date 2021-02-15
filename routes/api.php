<?php

use App\Http\Controllers\Api\BookController;
use App\Http\Controllers\Api\User\RegisterController;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('user')->group(function () {
    Route::post('register', [RegisterController::class, 'store']);
});

Route::prefix('book')->middleware('auth:sanctum')->group(function () {
   Route::post('send', [BookController::class, 'store']);
});
