<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\StudentController;
use App\Http\Controllers\Api\ClasseController;

Route::apiResource('students', StudentController::class);
Route::apiResource('classes', ClasseController::class);