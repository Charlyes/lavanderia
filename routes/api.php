<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::get('Report',[App\Http\Controllers\Api\ReportController::class, 'report']);

Route::get('cliente',[App\Http\Controllers\Api\ClienteController::class, 'all']);


Route::post('cliente',[App\Http\Controllers\Api\ClienteController::class, 'posts']);
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });
