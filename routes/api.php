<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryApiController;

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

Route::apiResource('/categories', CategoryApiController::class);

// Route::get('/categories', [CategoryApiController::class, 'index']);
// Route::post('/categories', [CategoryApiController::class, 'store']);
// Route::get('/categories/{id}', [CategoryApiController::class, 'show']);
// Route::put('/categories/{id}', [CategoryApiController::class, 'update']);
// Route::delete('/categories/{id}', [CategoryApiController::class, 'destroy']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
