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

Route::get('/', 'TaskController@index')->name('tasks');
Route::get('/tasks', 'TaskController@index')->name('tasks');
Route::get('/tasks/create', 'TaskController@create')->name('taskCreate');
Route::post('/tasks', 'TaskController@store')->name('taskStore');
Route::delete('/tasks/{id}', 'TaskController@destroy')->name('taskDestroy');
Route::get('/tasks/edit/{id}', 'TaskController@edit')->name('taskEdit');
Route::post('/tasks/updateBulk', 'TaskController@updateBulk')->name('taskUpdateBulk');
Route::put('/tasks/{id}', 'TaskController@update')->name('taskUpdate');
Route::get('/projects', 'ProjectController@index')->name('projects');
Route::get('/projects/create', 'ProjectController@create')->name('projectCreate');
Route::post('/projects', 'ProjectController@store')->name('projectStore');
Route::delete('/projects/{id}', 'ProjectController@destroy')->name('projectDestroy');

// Route::get('/home', 'HomeController@index')->name('home');
// Route::get('/', function () {
//     return view('projects.index');
// });

// Route::get('/tasks', function () {
//     return view('tasks.index');
// });

// Route::get('/projects', function () {
//     return view('projects.index');
// });
