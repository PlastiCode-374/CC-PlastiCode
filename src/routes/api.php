<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\ImageController;
use App\Http\Controllers\API\PlasticController;


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

Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function(){

    // ini untuk menyimpan image pertamakali
    Route::post('image', [ImageController::class, 'store']);

    // untuk dapetin data plastik
    Route::get('plastic/{jenis_plastik}', [PlasticController::class, 'show']);

    // untuk update hasil dari ML nya
    Route::match(['PUT', 'PATCH'], 'history-update/{history_id}', [ImageController::class, 'update']);
    
    // untuk dapetin semua history per user
    Route::get('user-histories/{user_id}', [ImageController::class, 'index']);

});