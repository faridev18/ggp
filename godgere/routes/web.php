<?php

use Illuminate\Support\Facades\Route;
Use App\Http\Controllers\AdminController;
Use App\Http\Controllers\ClientController;
Use App\Http\Controllers\ServiceController;
Use App\Http\Controllers\ControlController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

// require __DIR__.'/auth.php';

Route::get('/dashboard',[AdminController::class, 'dashboard']);

Route::get('/',[ClientController::class, 'acceuil']);
Route::get('/login',[ClientController::class, 'login']);
Route::post('/loginaction',[ClientController::class, 'loginaction']);
Route::get('/register',[ClientController::class, 'register']);
Route::post('/saveclient',[ClientController::class, 'saveclient']);
Route::get('/profil/{id}',[ClientController::class, 'profil']);
Route::get('/logout',[ClientController::class, 'logout']);
Route::get('/service/{id}',[ClientController::class, 'service']);
Route::get('/profilsetting',[ClientController::class, 'profilsetting']);
Route::post('/updateprofil',[ClientController::class, 'updateprofil']);
Route::get('/search',[ClientController::class, 'search']);
Route::get('/chat/{id}',[ClientController::class, 'chat']);
Route::post('/sendchat',[ClientController::class, 'sendchat']);
Route::get('/devenir-freelancer',[ClientController::class, 'devenirfreelancer']);
Route::post('/become',[ClientController::class, 'become']);







Route::get('/addservice',[ServiceController::class, 'addservice']);
Route::get('/services',[ServiceController::class, 'services']);
Route::post('/saveservice',[ServiceController::class, 'saveservice']);
Route::get('/editservice/{id}',[ServiceController::class, 'editservice']);
Route::post('/updateservice',[ServiceController::class, 'updateservice']);
Route::get('/deleteservice/{id}',[ServiceController::class, 'deleteservice']);
Route::post('/addrating',[ServiceController::class, 'addrating']);
Route::get('/makesearch',[ServiceController::class, 'makesearch']);



Route::get('/controlacceuil',[ControlController::class, 'controlacceuil']);
Route::get('/deleteuser/{id}',[ControlController::class, 'deleteuser']);
Route::get('/controlservices',[ControlController::class, 'controlservices']);
Route::get('/confirmservice/{id}',[ControlController::class, 'confirmservice']);
Route::get('/removeservice/{id}',[ControlController::class, 'removeservice']);
