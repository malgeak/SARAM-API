<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\AuthMiddleware;
use App\Http\Middleware\DeviceMiddleware;
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
//Rutas principales
Route::get('/', function () {
    return view('welcome');
});
Route::get('/cpanel', function () {
    return view('cpanel');
});
Route::get('/privacidad', function () {
    return view('Cpanel.privacidad');
});
Route::get('/login', function(){
	return view('Contents.login');
});
Route::get('/registro', function(){
	return view('Contents.registro');
});

Route::post('/api/correo', 'cpanelController@email');

//Rutas de dispositivo
Route::get('/api/saveDatos', 'sarv1Controller@saveDatos');

//Creadores de secciones
//Secciones de CPANEL
Route::get('/api/inicio', 'cpanelController@inicio')->middleware(AuthMiddleware::class);
Route::get('/api/contactos', 'cpanelController@contactos')->middleware(AuthMiddleware::class);
Route::get('/api/informacion', 'cpanelController@info')->middleware(AuthMiddleware::class);
Route::get('/api/perfil', 'cpanelController@perfil')->middleware(AuthMiddleware::class);
//Secciones de main
Route::get('/api/main', 'PrincipalController@index');
Route::get('/api/bot', 'PrincipalController@bot');
Route::get('/api/servicio', 'PrincipalController@servicio');
Route::get('/api/galeria', 'PrincipalController@galeria');
Route::get('/api/contacto', 'PrincipalController@contacto');
Route::get('/api/acerca', 'PrincipalController@acerca');


//Rutas Post
Route::post('/api/registerUser', 'UserController@registro');
Route::post('/api/login', 'UserController@login');
Route::post('/api/addmoto', 'UserController@AddMoto')->middleware(AuthMiddleware::class);
Route::post('/api/updatemoto', 'UserController@UpdateMoto')->middleware(AuthMiddleware::class);
Route::post('/api/getmotos', 'UserController@getMotos')->middleware(AuthMiddleware::class);
Route::post('/api/getuser', 'UserController@getUser')->middleware(AuthMiddleware::class);
Route::post('/api/userisReady', 'UserController@userReady')->middleware(AuthMiddleware::class);
Route::post('/api/updateUser', 'UserController@updateUser')->middleware(AuthMiddleware::class);
//Route::post('/api/getDeviceToken', 'sarv1Controller@setUpdate');
Route::post('/api/getEstado', 'sarv1Controller@getDatos')->middleware(AuthMiddleware::class);
Route::post('/api/getUbicacion', 'sarv1Controller@getUbicacion')->middleware(AuthMiddleware::class);
Route::post('/api/setContactos', 'UserController@setContactos')->middleware(AuthMiddleware::class);
Route::post('/api/updateContactos', 'UserController@updateContactos')->middleware(AuthMiddleware::class);
Route::post('/api/delContactos', 'UserController@delContactos')->middleware(AuthMiddleware::class);
Route::post('/api/getContactos', 'UserController@getContactos')->middleware(AuthMiddleware::class);
Route::post('/api/deleteMoto', 'UserController@DeleteMoto')->middleware(AuthMiddleware::class);
Route::post('/api/checkQR', 'UserController@QRCheck');
Route::post('/api/qrcode', 'UserController@QRgenerator')->middleware(AuthMiddleware::class);