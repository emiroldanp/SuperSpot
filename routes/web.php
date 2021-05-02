<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers;
use App\Events\CommentsEvent;

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

Route::get('/', 'App\Http\Controllers\SeriesController@index' );


//Ruta para crear eventos en broadcast
Route::get('/event/{comment}', function($comment){
    event(new CommentsEvent($comment));
});

//Ruta al controlador de las Commentarios
Route::resource('comments', 'App\Http\Controllers\CommentsController');

//Ruta al controlador de las Comics
Route::resource('comics', 'App\Http\Controllers\ComicsController');

//Ruta al controlador de las Series
Route::resource('series', 'App\Http\Controllers\SeriesController');

//Ruta al controlador del Usuario
Route::resource('user', 'App\Http\Controllers\UsersController');

//Ruta al controlador de las Categorias
Route::resource('category', 'App\Http\Controllers\CategoriesController');

//Ruta al controlador de Auth
Route::get('register', 'App\Http\Controllers\AuthController@register')->name('auth.register');
Route::post('register', 'App\Http\Controllers\AuthController@doRegister')->name('auth.do-register');

Route::get('login', 'App\Http\Controllers\AuthController@login')->name('auth.login');
Route::post('login', 'App\Http\Controllers\AuthController@doLogin')->name('auth.do-login');

Route::any('logout', 'App\Http\Controllers\AuthController@logout')->name('auth.logout');

Route::get('show', 'App\Http\Controllers\AuthController@show')->name('auth.show');
Route::any('updateUser', 'App\Http\Controllers\AuthController@updateUser')->name('auth.update-user');
Route::any('updatePassword', 'App\Http\Controllers\AuthController@updatePassword')->name('auth.update-password');
