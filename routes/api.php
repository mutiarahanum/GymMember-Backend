<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MembershipPackageController;
use App\Http\Controllers\MembershipController;
use App\Http\Controllers\PaymentController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::middleware('auth:sanctum')->group(function () {
    Route::apiResource('members', MemberController::class);
});

Route::post('/login', [AuthController::class, 'login']);

Route::apiResource('membership-packages', MembershipPackageController::class);

Route::apiResource('memberships', MembershipController::class);

Route::apiResource('payments', PaymentController::class);