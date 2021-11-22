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


Route::group(['namespace'=>'City','prefix'=>'cities'], function(){
    Route::get('/{city}/confirm', 'ConfirmController')->name('cities.confirm');
    Route::get('/', 'IndexController')->name('cities.index');
});

Route::group(['namespace'=>'User', 'prefix'=>'users'], function(){
    Route::get('/{user}', 'ShowController')->name('users.show');
});

Route::group(['namespace'=>'Rate', 'prefix'=>'rates'], function(){
    Route::get('/{city}/create','CreateController')->name('rates.create');
    Route::post('/{city}', 'StoreController')->name('rates.store');
    Route::get('/{rate}/edit', 'EditController')->name('rates.edit');
    Route::patch('/{rate}','UpdateController')->name('rates.update');
    Route::delete('/{rate}','DestroyController')->name('rates.destroy');

    Route::get('/user/{user}', 'IndexUserController')->name('rates.user.show');
    Route::get('/city/{city}','IndexCityController')->name('rates.city.show');
});

Auth::routes(['verify' => true]);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
