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

//-------------FRONTEND-----------------------------------------------------------------------------------------------------------------

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
Route::get('/students/results', 'frontend\TrajectoryTestController@showResults')->name('students.results');

//-------------BACKEND-----------------------------------------------------------------------------------------------------------------

//--------ADMIN-------------------------------
Route::get('/admin/log-in', 'backend\LoginController@index')->name('admin.logIn');
Route::post('/admin/log-in', 'backend\LoginController@logIn')->name('admin.log-in');
Route::get('/admin/log-out', 'backend\LoginController@logOut')->name('admin.log-out');

//--------USERS--------------------------
Route::get('/admin/users', 'backend\UsersController@index')->name('admin.users');
Route::post('/admin/users', 'backend\UsersController@storeUser')->name('admin.users.storeUser');
Route::delete('/admin/users/{id}', 'backend\UsersController@deleteUser')->name('admin.users.deleteUser');
Route::get('/admin/users/{id}/edit', 'backend\UsersController@editUser')->name('admin.users.editUser');
Route::put('/admin/users/{id}', 'backend\UsersController@updateUser')->name('admin.users.updateUser');
Route::get('/admin/users/search', 'backend\UsersController@searchUser')->name('admin.users.search');

//--------DASHBOARD----------------------------

Route::get('/admin', 'backend\DashboardController@index')->name('admin');

//-------ADMIN STUDENTS-------------------------------
Route::get('/admin/students', 'backend\StudentsAdminController@index')->name('admin.students');
Route::get('/admin/student/{id}', 'backend\StudentsAdminController@infoStudent')->name('admin.student.info');
Route::get('/admin/students/search', 'backend\StudentsAdminController@searchStudent')->name('admin.students.search');


//-------EDUCATIONAL PROGRAM--------------------
Route::get('/admin/educational-programs', 'backend\EducationalProgramController@index')->name('admin.educationalProgram');
Route::post('/admin/educational-programs', 'backend\EducationalProgramController@storeProgram')->name('admin.educationalProgram.storeProgram');
Route::delete('/admin/educational-programs/{id}', 'backend\EducationalProgramController@deleteProgram')->name('admin.educationalProgram.deleteProgram');
Route::get('/admin/educational-programs/{id}/edit', 'backend\EducationalProgramController@editProgram')->name('admin.educationalProgram.editProgram');
Route::put('/admin/educational-programs/{id}', 'backend\EducationalProgramController@updateProgram')->name('admin.educationalProgram.updateProgram');
Route::get('/admin/students/search', 'backend\EducationalProgramController@searchProgram')->name('admin.educationalProgram.search');
Route::get('/admin/educational-programs/{id}/groups', 'backend\EducationalProgramController@indexProgram')->name('admin.educationalProgram.indexGroups');
Route::get('/admin/educational-programs/group/student/{id}', 'backend\EducationalProgramController@infoStudent')->name('admin.educationalProgram.infoStudent');
Route::get('/admin/educational-programs/{id}/groups/students/search', 'backend\EducationalProgramController@searchGroupStudent')->name('admin.educationalProgram.searchStudent');

//--------GROUPS-------------------------------
Route::get('/admin/groups', 'backend\GroupsController@index')->name('admin.groups');
Route::post('/admin/groups', 'backend\GroupsController@storeGroup')->name('admin.groups.storeGroup');
Route::delete('/admin/groups/{id}', 'backend\GroupsController@deleteGroup')->name('admin.groups.deleteGroup');
Route::get('/admin/groups/{id}/edit', 'backend\GroupsController@editGroup')->name('admin.groups.editGroup');
Route::put('/admin/groups/{id}', 'backend\GroupsController@updateGroup')->name('admin.groups.updateGroup');
Route::get('/admin/groups/search', 'backend\GroupsController@searchGroup')->name('admin.groups.search');

//--------REPORTS------------------------------
Route::get('/admin/reports','backend\ReportsController@index')->name('admin.reports');
Route::post('/admin/reports','backend\ReportsController@generateReport')->name('admin.reports.generate');
