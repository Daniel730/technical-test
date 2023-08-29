<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\InspectionController;
use App\Http\Controllers\TurbineController;
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

Route::group(['middleware' => 'web'], function () {
    Route::get('/', [HomeController::class, 'index']);

    Auth::routes();

    Route::get('/home', [HomeController::class, 'index'])->name('home');

    Route::controller(HomeController::class)->group(function () {
        Route::get('/inspection/new', 'index')->name('new-inspection');
    });

    Route::controller(TurbineController::class)->group(function () {
        Route::get('/turbine/{id}/edit', 'edit')->name('edit-turbine');
        Route::get('/turbine/new', 'new')->name('new-turbine');
    });

    Route::controller(InspectionController::class)->group(function () {
        Route::get('/inspection/new', 'new')->name('new-inspection');
    })
});
