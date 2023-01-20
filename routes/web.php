<?php

use App\Constants\KangarooConstant;
use App\Http\Controllers\KangarooController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [KangarooController::class, 'redirectToHomePage']);

Route::controller(KangarooController::class)
    ->prefix(KangarooConstant::ROUTE_PREFIX)
    ->group(function () {
        Route::get('/', 'index')->name('kangaroo.home');
        Route::get('/create', 'create');
        Route::get('/edit/{oKangaroo}', 'edit');
    });