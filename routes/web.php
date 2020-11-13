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

Route::get('/', 'App\Http\Controllers\MainController@index');
Route::get('/employees', 'App\Http\Controllers\EmployeesController@index');
Route::get('/employees/editform/{id}', 'App\Http\Controllers\EmployeesController@editform');
Route::post('/employees/edit', 'App\Http\Controllers\EmployeesController@edit');
Route::get('/employees/delform/{id}', 'App\Http\Controllers\EmployeesController@del');
Route::get('/departments', 'App\Http\Controllers\DepartmentsController@index');
Route::get('/departments/editform/{id}', 'App\Http\Controllers\DepartmentsController@editform');
Route::post('/departments/edit', 'App\Http\Controllers\DepartmentsController@edit');
Route::get('/departments/delform/{id}', 'App\Http\Controllers\DepartmentsController@delform');
Route::post('/departments/del', 'App\Http\Controllers\DepartmentsController@del');
