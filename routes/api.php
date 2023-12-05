<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\CardController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('register', [UserController::class, 'store']);
Route::post('login', [UserController::class, 'index']);
Route::get('register/get/{id}', [UserController::class, 'show']);
Route::post('account/update/{id}', [AccountController::class, 'update']);
Route::post('account/reduce/{id}', [AccountController::class, 'destroy']);
Route::post('transaction', [TransactionController::class, 'store']);
Route::get('transaction/get/{id}', [TransactionController::class, 'show']);
Route::post('card/{id}', [CardController::class, 'update']);
Route::delete('clear/{id}', [AccountController::class, 'remove']);
Route::post('notification', [NotificationController::class, 'update']);
Route::get('notification/get/{id}', [NotificationController::class, 'show']);
