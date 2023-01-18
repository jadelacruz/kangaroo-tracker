<?php

use App\Http\Controllers\KangarooPageController;
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

Route::controller(KangarooPageController::class)
    ->group(function () {
        Route::get('/', 'redirectToHomePage');
        Route::get('/kangaroo', 'index')->name('kangaroo.home');
        Route::get('/kangaroo/create', 'create');
        Route::get('/kangaroo/modify', 'edit');
    });