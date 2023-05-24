<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;

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

Route::get('/getall', [ApiController::class, 'getAll']);
Route::get('/getbydate', [ApiController::class, 'getByDate']);
Route::post('/add', [ApiController::class, 'add']);
Route::put('/update', [ApiController::class, 'update']);
Route::delete('/delete', [ApiController::class, 'delete']);