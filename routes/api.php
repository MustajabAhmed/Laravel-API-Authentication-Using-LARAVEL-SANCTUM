<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\Api\AuthController;

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

Route::post('/auth/register', [AuthController::class, 'createUser']);
Route::post('/auth/login', [AuthController::class, 'loginUser']);
Route::post('/auth/logout', [AuthController::class, 'logoutuser']);

Route::post('store', [StudentController::class, 'store'])->middleware('auth:sanctum');
Route::get('show', [StudentController::class, 'show'])->middleware('auth:sanctum');
Route::post('update/{id}', [StudentController::class, 'update'])->middleware('auth:sanctum');
Route::delete('delete/{id}', [StudentController::class, 'delete'])->middleware('auth:sanctum');