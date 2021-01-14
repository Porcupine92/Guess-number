<?php

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
    return redirect('/new');
});

Route::group([
    'namespace' => 'Game'
], function () {

    Route::get('/new', 'UserController@create')
        ->name('user.store');

    Route::get('/new/validate', 'UserController@validation')
        ->name('user.profile');

    Route::get('/guess', 'GameController@index')
        ->name('game.index');

    Route::get('/scores', 'ScoresController')
        ->name('scores');
});
