<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\AuthMiddleware;
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

//Rutas Post
Route::post('/api/registerUser', 'UserController@registro');
Route::post('/api/login', 'UserController@login');
Route::post('/api/addmoto', 'UserController@AddMoto')->middleware(AuthMiddleware::class);
Route::post('/api/updatemoto', 'UserController@UpdateMoto')->middleware(AuthMiddleware::class);
Route::post('/api/getmotos', 'UserController@getMotos')->middleware(AuthMiddleware::class);

