<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\StudentController;
use App\Http\Controllers\Api\ClasseController;
use App\Http\Controllers\Api\NoteController;

// 🟢 Routes Publiques (pour se connecter et s'inscrire)
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

// 🔴 Routes Protégées par Sanctum
Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);

    Route::apiResource('students', StudentController::class);
    Route::apiResource('classes', ClasseController::class);
    Route::apiResource('notes', NoteController::class);
});