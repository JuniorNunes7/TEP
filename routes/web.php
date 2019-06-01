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

Route::get('/', function () {
    // return redirect('/teacher/create');
    return view('home');
});

// Professor
Route::get('/teacher/create', 'TeacherController@create');
Route::post('/teacher/create', 'TeacherController@store');

// Turma
Route::get('/class/create', 'ClassController@create');
Route::post('/class/create', 'ClassController@store');

// Grade
Route::get('/grid/create', 'GridController@create');
Route::put('/grid/update', 'GridController@update');