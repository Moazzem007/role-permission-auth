<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



Route::post('login', [AuthController::class, 'login']);
Route::post('register', [AuthController::class, 'register']);


Route::middleware(['auth:api', 'permission:view_users'])->group(function () {
    Route::apiResource('users', UserController::class);
});
Route::middleware(['auth:api', 'permission:assign_roles'])->group(function () {
    Route::post('users/{user}/assign-role', [UserController::class, 'assignRole']);
});
Route::middleware(['auth:api', 'permission:assign_permissions'])->group(function () {
    Route::post('roles/{role}/assign-permission', [RoleController::class, 'assignPermission']);
});
Route::middleware(['auth:api', 'permission:view_roles'])->group(function () {
    Route::apiResource('roles', RoleController::class);
});
Route::middleware(['auth:api', 'permission:view_permissions'])->group(function () {
    Route::apiResource('permissions', PermissionController::class);
});
