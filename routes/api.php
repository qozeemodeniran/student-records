<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Creating endpoints that reference the methods/functions created in ApiController...

// Endpoint to get all students
Route::get('students', 'App\Http\Controllers\ApiController@getAllStudents');

// Endpoint that returns specific student
Route::get('students/{id}', 'App\Http\Controllers\ApiController@getStudent');

// Endpoint that creates new student
Route::post('students', 'App\Http\Controllers\ApiController@createStudent');

// Endpoint that update student
Route::put('students/{id}', 'App\Http\Controllers\ApiController@updateStudent');

// Endpoint that deletes studdent
Route::delete('student/{id}', 'App\Http\Controllers\ApiController@deleteStudent');
