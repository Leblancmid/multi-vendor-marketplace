<?php

use App\Http\Controllers\Api\AuthController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth:sanctum', 'role:admin'])->get('/admin-only', function () {
    return response()->json(['message' => 'Welcome admin']);
});

Route::middleware(['auth:sanctum', 'role:vendor'])->get('/vendor-only', function () {
    return response()->json(['message' => 'Welcome vendor']);
});

Route::middleware(['auth:sanctum', 'role:customer'])->get('/customer-only', function () {
    return response()->json(['message' => 'Welcome customer']);
});
