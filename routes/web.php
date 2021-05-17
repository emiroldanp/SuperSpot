<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers;
use App\Events\CommentsEvent;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use App\Http\Controllers\GoogleController;


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
Route::get('/series/event/{comment}/{id_escritor}/{id_usuario}', function($comment, $id_escritor, $id_usuario){
    event(new CommentsEvent($comment, $id_escritor, $id_usuario));
});

//Ruta al controlador de las Commentarios
Route::resource('/series/comments', 'App\Http\Controllers\CommentsController');
Route::put('/series/comments/likes/{id}', 'App\Http\Controllers\CommentsController@updateLikes');
Route::put('/series/comments/dislikes/{id}', 'App\Http\Controllers\CommentsController@updateDislikes');

//Ruta al controlador de las Comics
Route::resource('comics', 'App\Http\Controllers\ComicsController');

//Ruta al controlador de las SeriesPauth
Route::resource('series', 'App\Http\Controllers\SeriesController');
Route::get('alphabetically', 'App\Http\Controllers\SeriesController@alphabetically');
Route::get('character', 'App\Http\Controllers\SeriesController@character');
Route::get('upcoming', 'App\Http\Controllers\SeriesController@upComing');

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

//Laravel Socialite
Route::get('/auth/redirect', function () {
    return Socialite::driver('github')->redirect();
});

Route::get('/auth/callback', function () {

    $githubUser = Socialite::driver('github')->user();

    $user = User::where('provider_id', $githubUser->getId())->first();

    if(!$user) {
        // add user to database
        $user = User::create([
            'email' => $githubUser->getEmail(),
            'name' => $githubUser->getName(),
            'provider_id'=> $githubUser->getId(),
            'provider' => 'github'
        ]);
    }
    // login the user
    Auth::login($user, true);

    return redirect()->route('series.index');

});

Route::get('auth/google', [GoogleController::class, 'redirectToGoogle']);
Route::get('auth/google/callback', [GoogleController::class, 'handleGoogleCallback']);
