<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserProfileController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


// users profile routes
Route::get('users', [UserProfileController::class, 'index']);
Route::post('users', [UserProfileController::class, 'store']);
Route::get('users/{id}', [UserProfileController::class, 'show']);
Route::post('users/{id}', [UserProfileController::class, 'update']);
Route::delete('users/{id}', [UserProfileController::class, 'destroy']);
