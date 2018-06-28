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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => 'auth'], function(){

    Route::get('/Students','Student@index')->name('Students');
    Route::get('/Courses', 'Course@index')->name('Courses');

});
Route::group(['middleware' => 'admin'], function(){

    //
    Route::post('/Courses', 'Course@store');
    Route::get('/Courses/{Course}/edit', 'Course@edit');
    Route::delete('/Courses/{Course}', 'Course@destroy');
    Route::get('/Courses/create', 'Course@create');
    Route::put('/Courses/{Course}', 'Course@update');
    Route::get('/Courses/{Course}', 'Course@show');
    //
    Route::post('/Students', 'Student@store');
    Route::get('/Students/{Student}/edit', 'Student@edit');
    Route::delete('/Students/{Student}', 'Student@destroy');
    Route::get('/Students/create', 'Student@create');
    Route::put('/Students/{Student}', 'Student@update');
    Route::get('/Students/{Student}', 'Student@show');
    //
    Route::resource('/Enrollment','enrollment');

});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
