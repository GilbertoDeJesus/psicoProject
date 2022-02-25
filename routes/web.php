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
Route::get('/log-out', 'frontend\StudentsController@logOut')->name('student.log-out');
Route::post('/log-in', 'frontend\StudentsController@logIn')->name('student.log-in');
Route::post('/sign-up', 'frontend\StudentsController@storeStudent')->name('student.storeStudent');

//--------TESTS---------------------------
Route::get('/students/questionnaires', 'frontend\StudentsController@index')->name('students.tests');

Route::get('/students/learning-style', 'frontend\LearningTestController@index')->name('students.learnigStyle');
Route::post('/students/learning-style', 'frontend\LearningTestController@storeTest')->name('students.storeTest');

Route::get('/students/vocational-orientation', 'frontend\VocationalTestController@index')->name('students.vocational');
Route::post('/students/vocational-orientation', 'frontend\VocationalTestController@storeTest')->name('students.storeVocationalTest');

Route::get('/students/educational-trajectory', 'frontend\TrajectoryTestController@index')->name('students.trajectory');
Route::post('/students/educational-trajectory', 'frontend\TrajectoryTestController@storeTest')->name('students.storeTrajectoryTest');
