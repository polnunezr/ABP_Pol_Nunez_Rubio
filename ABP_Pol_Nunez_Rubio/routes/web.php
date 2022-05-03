<?php

use App\Http\Controllers\CicleController;
use App\Http\Controllers\CursController;
use App\Http\Controllers\ModulController;
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
    return view("plantillas.index");
});

Route::resource("curs",CursController::class);
Route::resource("cicle",CicleController::class);
Route::resource("modul",ModulController::class);


