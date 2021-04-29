<?php

use App\Http\Controllers\FarmController;
use App\Http\Controllers\InventoryController;
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

Route::get('/', function () {
    return view('welcome');
})->name('inicio');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/home/activate/{id}', [App\Http\Controllers\HomeController::class, 'activarUser'])->name('home.activate');

Route::get('/home/desactivate/{id}', [App\Http\Controllers\HomeController::class, 'desactivarUser'])->name('home.desactivate');

Route::resource('inventario', InventoryController::class)->names('inventario');

Route::resource('farm', FarmController::class)->names('farm');
Route::get('/farm/disable/{id}', 'App\Http\Controllers\FarmController@disable')->name('farm.disable');
Route::get('/farm/enable/{id}', 'App\Http\Controllers\FarmController@enable')->name('farm.enable');
