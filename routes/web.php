<?php

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\FilierController;
use App\Http\Controllers\ModuleController;
use App\Http\Controllers\MaClassController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\AchiveStuController;
use App\Http\Controllers\AchiveProfController;
use App\Http\Controllers\AffictationController;
use App\Http\Controllers\NoteController;

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
Route::resource('Class', MaClassController::class);
Route::resource('/Note', NoteController::class);
Route::post('Class/showModuls', [MaClassController::class, 'showModuls'])->name('Class.showModuls');
Route::resource('/filiere', FilierController::class);
Route::resource('/Prof', UserController::class);
Route::get('/edit_prof/{id}', 'App\Http\Controllers\UserController@edit');
Route::get('/edit_stu/{id}', 'App\Http\Controllers\StudentController@edit');
Route::get('/profile/{id}', 'App\Http\Controllers\UserController@profile')->name('profile');
Route::get('/Status_show/{id}', 'App\Http\Controllers\UserController@show');
Route::resource('teacher/Archive', AchiveProfController::class);
Route::resource('Affectation', AffictationController::class);
Route::resource('Student', StudentController::class);
Route::resource('delete/archive', 'App\Http\Controllers\AchiveProfController@destroy');
Route::resource('Unarchive', AchiveProfController::class);
Route::post('/Status_update/{id}', 'App\Http\Controllers\UserController@Status_Update');
Route::get('/Prof/update', 'App\Http\Controllers\UserController@update');
Route::resource('/Student/Archive', AchiveStuController::class);
Route::get('/{page}', [AdminController::class,'index']);

