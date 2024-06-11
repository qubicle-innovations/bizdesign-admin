<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontendController;

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

Route::get('/gethomedata', [FrontendController::class, 'index']);
Route::get('/servicepage', [FrontendController::class, 'serviceDisplay']);
Route::get('/aboutus', [FrontendController::class, 'aboutus']);
Route::get('/servicepage', [FrontendController::class, 'serviceDisplay']);
Route::get('/servicedetail/{id}', [FrontendController::class, 'serviceDetails']);
Route::get('/businessdetail/{id}', [FrontendController::class, 'businessDetails']);
Route::get('/expertise', [FrontendController::class, 'expertise']);
