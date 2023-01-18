<?php

use App\Http\Controllers\KangarooController;
use Illuminate\Support\Facades\Route;

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


Route::controller(KangarooController::class)
    ->group(function () {
        Route::get('/kangaroo/{id}', 'show');
        Route::post('/kangaroo', 'insert');
        Route::put('/kangaroo/{id}', 'update');
        Route::delete('/kangaroo/{id}', 'destroy');
    });