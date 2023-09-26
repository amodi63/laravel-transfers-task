<?php

use App\Http\Controllers\Api\Auth\AuthController;
use App\Http\Controllers\Api\TransferController;
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

// Transfer routes
Route::get('/transfers', [TransferController::class, 'index']);
Route::post('/transfers', [TransferController::class, 'store']);
Route::get('/transfers/export-transfers', [TransferController::class, 'exportTransfers']);
Route::delete('/transfers/{transfer}', [TransferController::class, 'destroy']);

// Authentication routes for users
Route::prefix('admin')->group(function () {
    Route::post('/register', [AuthController::class, 'registerUser']);
    Route::post('/login', [AuthController::class, 'loginUser']);
    Route::post('/logout', [AuthController::class, 'logoutUser'])->middleware('auth:sanctum');
    Route::get('/profile', [AuthController::class, 'userProfile'])->middleware('auth:sanctum');
});

// Authentication routes for merchants
Route::post('/register', [AuthController::class, 'registerMerchant']);
Route::post('/login', [AuthController::class, 'loginMerchant']);
Route::post('/logout', [AuthController::class, 'logoutMerchant'])->middleware('auth:sanctum');
Route::get('/profile', [AuthController::class, 'merchantProfile'])->middleware('auth:sanctum');



