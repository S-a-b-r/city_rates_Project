<?php

use App\Http\Controllers\MainController;
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

Route::get('/', [MainController::class, 'index'])->name('index');

Route::group(['prefix' => 'cities'], function () {
    Route::get('/', [\App\Http\Controllers\CityController::class, 'index'])->name('city.index');
    Route::get('/{city}/rates',[\App\Http\Controllers\CityController::class, 'show'])->name('city.show');
    Route::group(['prefix'=>'/{city}'], function()
    {
        Route::get('/{rate}',[\App\Http\Controllers\RateController::class, 'show'])->name('rate.show');
        Route::get('/rates/create',[\App\Http\Controllers\RateController::class, 'create'])->name('rate.create')->middleware('auth');
        Route::post('/rates',[\App\Http\Controllers\RateController::class, 'store'])->name('rate.store');
    });
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
