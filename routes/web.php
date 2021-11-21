<?php

use App\Http\Controllers\MainController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
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

//Добавить middleware 'verified' для подтверждения верификации
Route::group(['prefix' => 'cities'], function () {
    Route::get('/', [\App\Http\Controllers\CityController::class, 'index'])->name('city.index');

    Route::group(['prefix'=>'/{city}'], function()
    {
        Route::get('/rates',[\App\Http\Controllers\CityController::class, 'show'])->name('city.show');
        Route::get('/confirm', [\App\Http\Controllers\CityController::class,'confirm'])->name('city.confirm');
        Route::get('/{rate}',[\App\Http\Controllers\RateController::class, 'show'])->name('rate.show');
        Route::get('/rates/create',[\App\Http\Controllers\RateController::class, 'create'])->name('rate.create')->middleware('auth');
        Route::post('/rates',[\App\Http\Controllers\RateController::class, 'store'])->name('rate.store');
    });
});

Route::group(['prefix'=>'rates'], function(){
    Route::get('/{rate}/edit',[\App\Http\Controllers\RateController::class, 'edit'])->name('rate.edit')->middleware('author');
    Route::patch('/{rate}',[\App\Http\Controllers\RateController::class, 'update'])->name('rate.update')->middleware('author');
    Route::delete('/{rate}',[\App\Http\Controllers\RateController::class, 'destroy'])->name('rate.destroy')->middleware('author');
});

Route::group(['prefix'=>'users'], function(){
    Route::get('/{user}', [UserController::class, 'show'])->name('user.show');
    Route::get('/{user}/rates', [UserController::class, 'showRates'])->name('user.rates.show');
});


Auth::routes(['verify' => true]);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
