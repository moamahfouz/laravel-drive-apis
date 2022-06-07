<?php

use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Route::view('/', 'welcome');

// google
Route::get('/login/google', [LoginController::class, 'redirectToGoogleProvider']);
Route::get('/google_api/save_access_token', [LoginController::class, 'handleProviderGoogleCallback']);


// drive

Route::get('/drive', 'DriveController@getDrive'); // retreive folders
Route::get('/drive/upload', 'DriveController@uploadFile'); // File upload form
Route::post('/drive/upload', 'DriveController@uploadFile'); // Upload file to Drive from Form
Route::get('/drive/create', 'DriveController@create'); // Upload file to Drive from Storage
Route::get('/drive/delete/{id}', 'DriveController@deleteFile'); // Delete file or folder


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('/logout', function(){
    Auth::logout();
    return redirect('/');

});
