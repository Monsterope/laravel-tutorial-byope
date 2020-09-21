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
    return view('index');
});

Route::get('/response', function (){
    return response()->json(["message" => "Unauthorized"], 401);
})->name("unauthorized");

Route::post('/login-user', 'LoginController@Login');
Route::get('/logout', function (){
    auth()->logout();
    return response()->json(["message" => "Logout success"]);
});

Route::group(["middleware" => ["auth", "access_acc"]], function (){
    
    Route::get('/myprofile', function (){
        return response()->json(["profile" => auth()->user()]);
    });
    Route::get('/student_self', 'StudentController@GetStudentByStudent');
    
    Route::group(["middleware" => ["access_type"]], function (){
        Route::get('/classroom', 'ClassroomController@GetClassroom');
        Route::get('/classroom/roomandstudent', 'ClassroomController@GetClassroomStudentroomAndStudent');
        Route::get('/classroom/search/studentroom', 'ClassroomController@SearchClassroomSoGetListStudentroom');
        Route::post('/createclassroom', 'ClassroomController@CreateClassroom');
        Route::put('/updclassroom/{id}', 'ClassroomController@UpdateClassroom');
        Route::delete('/delclassroom/{id}', 'ClassroomController@DeleteClassroom');

        Route::get('/room', 'StudentroomController@GetStudentRoom');
        Route::post('/createroom', 'StudentroomController@CreateStudentRoom');
        Route::put('/updroom/{id}', 'StudentroomController@UpdateStudentRoom');
        Route::delete('/delroom/{id}', 'StudentroomController@DeleteStudentRoom');

        Route::get('/student', 'StudentController@GetStudent');
        Route::post('/createstudent', 'StudentController@CreateStudent');
        Route::put('/updstudent/{id}', 'StudentController@UpdateStudent');
        Route::delete('/delstudent/{id}', 'StudentController@DeleteStudent');
    });
    
});

