<?php

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AchiveController;
use App\Http\Controllers\FilierController;
use App\Http\Controllers\ModuleController;
use App\Http\Controllers\AffictationController;

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

Auth::routes(['register' => false]);

Route::get('/', function () {
        return view('auth.login');
});
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('/Module', ModuleController::class);
Route::resource('/filiere', FilierController::class);
Route::resource('/Prof', UserController::class);
Route::get('/edit_prof/{id}', 'App\Http\Controllers\UserController@edit');
Route::get('/profile/{id}', 'App\Http\Controllers\UserController@profile')->name('profile');
Route::get('/Status_show/{id}', 'App\Http\Controllers\UserController@show');
Route::resource('teacher/Archive', AchiveController::class);
Route::resource('Affectation', AffictationController::class);
Route::resource('delete/archive', 'App\Http\Controllers\AchiveController@destroy');
Route::resource('Unarchive', AchiveController::class);
Route::post('/Status_update/{id}', 'App\Http\Controllers\UserController@Status_Update');
Route::get('/Prof/update', 'App\Http\Controllers\UserController@update');
Route::get('/{page}', [AdminController::class,'index']);
