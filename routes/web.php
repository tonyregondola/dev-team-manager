<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
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

//Route::get('/', 'UserController@loginForm')->name('login.form');
//Route::post('/login', 'UserController@login')->name('login');
//Route::get('/login', [UserController::class, 'loginForm'])->name('login.form');
//Route::post('/login', [UserController::class, 'loginSubmit'])->name('login.submit');
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
//Route::post('/logout', [AuthController::class, 'logout']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
//Route::get('/dashboard', [UserController::class,'dashboard'])->name('dashboard');


Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', 'UserController@dashboard')->name('dashboard');
    Route::resource('/employees', 'EmployeeController');

    Route::get('/employees/{employee}/edit', [EmployeeController::class, 'edit'])->name('employees.edit');
    Route::put('/employees/{employee}', [EmployeeController::class, 'update'])->name('employees.update');


});
