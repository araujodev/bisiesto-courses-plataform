<?php
//Root.
Route::get('/', 'CoursesController@index');


//Courses Routes
Route::get('/courses', [
    'uses' => 'CoursesController@index',
    'as' => 'courses'
]);
Route::post('/courses', [
    'uses' => 'CoursesController@store',
    'middleware' => 'roles',
    'roles' => ['Admin']
]);
Route::put('/courses/{id}', [
    'uses' => 'CoursesController@update',
    'middleware' => 'roles',
    'roles' => ['Admin']

]);
Route::delete('/courses/{id}', [
    'uses' => 'CoursesController@destroy',
    'middleware' => 'roles',
    'roles' => ['Admin']

]);
Route::get('/courses/create', [
    'uses' => 'CoursesController@create',
    'middleware' => 'roles',
    'roles' => ['Admin']

]);
Route::get('/courses/{id}/edit', [
    'uses' => 'CoursesController@edit',
    'middleware' => 'roles',
    'roles' => ['Admin']
]);
Route::get('/courses/{id}', 'CoursesController@show');


Route::auth();
