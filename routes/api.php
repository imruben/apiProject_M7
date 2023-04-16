<?php

use App\Http\Controllers\Api\PizzaController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::controller(PizzaController::class)->group(function () {
    Route::get('/pizzas',  'index');
    Route::post('/pizzas', 'store');
    Route::get('/pizzas/{id}', 'show');
    Route::get('/pizzas/provider/{id}', 'showProvider');
    Route::put('/pizzas', 'update');
    Route::delete('/pizzas/{id}', 'destroy');
});
