<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers;

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
    return view('index');
});

//Ruta al controlador de las Commentarios
Route::resource('comments', 'App\Http\Controllers\CommentsController');

//Ruta al controlador de las Comics
Route::resource('comics', 'App\Http\Controllers\ComicsController');

//Ruta al controlador de las Series
Route::resource('series', 'App\Http\Controllers\SeriesController');

//Ruta al controlador del Usuario
Route::resource('user', 'App\Http\Controllers\UsersController');