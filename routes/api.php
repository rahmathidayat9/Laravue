<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\RegisterController;
// use App\Http\Controllers\LoginController;
use App\Http\Controllers\PostController;

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

Route::post('register', RegisterController::class);
Route::post('login', LoginController::class);
Route::post('logout', LogoutController::class)->middleware('auth:sanctum');

Route::get('posts', [PostController::class, 'index']);
Route::post('posts', [PostController::class, 'store']);
Route::get('posts/{id}/edit', [PostController::class, 'edit']);
Route::patch('posts/{id}', [PostController::class, 'update']);
Route::delete('posts/{id}', [PostController::class, 'destroy']);