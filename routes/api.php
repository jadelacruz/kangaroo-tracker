<?php

use App\Constants\KangarooConstant;
use App\Http\Controllers\Api\KangarooApiController;
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


Route::controller(KangarooApiController::class)
    ->prefix(KangarooConstant::ROUTE_PREFIX)
    ->group(function () {
        Route::get('/', 'getAll');
        Route::get('/{iId}', 'getById');
        Route::post('/', 'insert');
        Route::put('/{iId}', 'update');
        Route::delete('{iId}', 'delete');
    });