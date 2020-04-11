<?php

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
Auth::routes(['register' => false]);

Route::get('/', 'WelcomeController@index')->name('home');

Route::middleware('auth')->group(function () {
    Route::resource('tasks', 'TaskController')
        ->except(['show', 'index', 'edit']);

    Route::resource('projects', 'ProjectController')
        ->except(['show', 'index', 'edit']);
});
