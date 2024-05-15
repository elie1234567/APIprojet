<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\crudControllers;

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

Route::prefix('v1/crud')->group(function(){

    Route::get('/',[crudControllers::class,'get']);
    Route::post('/',[crudControllers::class,'create']);
    Route::get('/{id}',[crudControllers::class,'getById']);
    Route::put('/{id}',[crudControllers::class,'update']);
    Route::delete('/{id}',[crudControllers::class,'delete']);
});

