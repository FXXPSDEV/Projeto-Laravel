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
    return view('auth/login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => 'auth'], function(){

    Route::get('/Students','Student@index')->name('Students');
    Route::get('/Courses', 'Course@index')->name('Courses');
    Route::get('/Enrollment', 'Enrollment@index')->name('Enrollments');
    Route::get('/Enrollment/create', 'Enrollment@create');
    Route::post('/Enrollment', 'Enrollment@store');
    Route::get('/Students/{Student}', 'Student@show');
    Route::put('/Students/{Student}', 'Student@update');

});
Route::group(['middleware' => 'admin'], function(){

    //Course
    Route::post('/Courses', 'Course@store');
    Route::get('/Courses/{Course}/edit', 'Course@edit');
    Route::delete('/Courses/{Course}', 'Course@destroy');
    Route::get('/Courses/create', 'Course@create');
    Route::put('/Courses/{Course}', 'Course@update');
    Route::get('/Courses/{Course}', 'Course@show');
    //Student
    Route::post('/Students', 'Student@store');
    Route::get('/Students/{Student}/edit', 'Student@edit');
    Route::get('/Students/{Student}/edit', 'Student@auth');
    Route::delete('/Students/{Student}', 'Student@destroy');
    Route::get('/Students/create', 'Student@create');
    Route::patch('/Students/{Student}', 'Student@authorized');
    
    
    //Enrollment 
    Route::get('/Enrollment/{Enrollments}/edit', 'Enrollment@edit');
    Route::delete('/Enrollment/{Enrollments}', 'Enrollment@destroy');
    
    Route::put('/Enrollment/{Enrollments}', 'Enrollment@update');
    Route::get('/Enrollment/{Enrollments}', 'Enrollment@show');

});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
