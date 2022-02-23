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
    return redirect()->route('sign-up');
});


//--------STUDENTS-------------------------
Route::get('/sign-up', 'frontend\StudentsController@signUp')->name('sign-up');
Route::post('/sign-up', 'frontend\StudentsController@storeStudent')->name('student.storeStudent');

//--------TESTS---------------------------
Route::get('/students/questionnaires', 'frontend\StudentsController@index')->name('students.tests');
