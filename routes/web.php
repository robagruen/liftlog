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

Route::get('/', 'ExercisesController@index');

Auth::routes();

Route::get('/add-exercise', 'ExercisesController@viewAddExercise');
Route::post('/add-exercise', 'ExercisesController@addExercise');

Route::get('/single-exercise/{exercise}/', 'ExercisesController@viewSingleExercise');
Route::post('/single-exercise/{exercise}/entry/{entry}', 'ExercisesController@deleteEntry');

Route::get('/single-exercise/{exercise}/add-entry', 'ExercisesController@viewAddEntry');
Route::post('/add-entry', 'ExercisesController@addEntry');

Route::get('/categories', 'ExercisesController@viewCategories');
Route::get('/add-category', 'ExercisesController@viewAddCategory');
Route::post('/add-category', 'ExercisesController@addCategory');
Route::get('/categories/single-category/{category}/', 'ExercisesController@viewSingleCategory');

Route::get('/settings/', 'ExercisesController@viewSettings');
Route::post('/settings/delete-exercise/{exercise}', 'ExercisesController@deleteExercise');
Route::post('/settings/delete-category/{category}', 'ExercisesController@deleteCategory');
