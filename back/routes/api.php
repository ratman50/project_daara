<?php

use App\Http\Controllers\AnneeController;
use App\Http\Controllers\auth\AuthController;
use App\Http\Controllers\ClasseController;
use App\Http\Controllers\EleveController;
use App\Http\Controllers\NiveauController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::group(['middleware' => ['auth:sanctum']], function() {
    Route::apiResource("users", UserController::class);
    Route::apiResource("annee", AnneeController::class);
    Route::apiResource("niveau",NiveauController::class);
    Route::apiResource("classe",ClasseController::class);
    Route::apiResource("eleve",EleveController::class);
});
Route::post('login',[AuthController::class,"login"]);