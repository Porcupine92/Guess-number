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

    Route::get('/new', 'UserController')
        ->name('user');

    Route::get('/guess', 'GameController')
        ->name('game');

    Route::get('/scores', 'ScoresController')
        ->name('scores');
});
