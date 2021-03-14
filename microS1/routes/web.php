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
    return view('welcome');
});

///////////////////////////CRUD STUDENT///////////////////////////////////
Route::post('students/add','StudentController@storeStudent');
Route::get('students/index','StudentController@indexStudents');
Route::get('students/get/{id}','StudentController@getStudent');
Route::put('students/edit/{id}','StudentController@editStudent');
Route::delete('students/delete/{id}','StudentController@deleteStudent');

///////////////////////////CRUD TEACHER////////////////////////////////////
Route::post('teachers/add','TeacherController@storeTeacher');
Route::get('teachers/index','TeacherController@indexTeachers');
Route::get('teachers/get/{id}','TeacherController@getTeacher');
Route::put('teachers/edit/{id}','TeacherController@editTeacher');
Route::delete('teachers/delete/{id}','TeacherController@deleteTeacher');

///////////////////////////CRUD CLASS////////////////////////////////////
Route::post('classes/add','ClassroomController@storeClass');
Route::get('classes/index','ClassroomController@indexClasses');
Route::get('classes/get/{id}','ClassroomController@getClass');
Route::put('classes/edit/{id}','ClassroomController@editClass');
Route::delete('classes/delete/{id}','ClassroomController@deleteClass');

///////////////////////////CRUD SUBJECT////////////////////////////////////
Route::post('subjects/add','SubjectController@storeSubject');
Route::get('subjects/index','SubjectController@indexSubjects');
Route::get('subjects/get/{id}','SubjectController@getSubject');
Route::put('subjects/edit/{id}','SubjectController@editSubject');
Route::delete('subjects/delete/{id}','SubjectController@deleteSubject');

///////////ADD/DELETE STUDENTS & CLASSES TO/FROM TEACHER//////////////////
Route::post('teachers/classes/add/{id}','TeacherController@addTeacherClasses');
Route::post('teachers/students/add/{id}','TeacherController@addTeacherStudents');
Route::delete('teachers/classes/delete/{teacher_id}/{class_id}','TeacherController@deleteTeacherClasses');
Route::delete('teachers/students/delete/{teacher_id}/{student_id}','TeacherController@deleteTeacherStudents');

//////////////////ADD/DELETE SUBJECTS TO/FROM STUDENT/////////////////////
Route::post('students/subjects/add/{id}','StudentController@addStudentSubjects');
Route::post('students/subjects/delete/{student_id}/{subject_id}','StudentController@deleteStudentSubjects');

