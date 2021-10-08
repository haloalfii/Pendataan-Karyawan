<?php

use App\Models\Employee;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\EmployeeController;
use Illuminate\Support\Facades\Log;

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

Route::get('/', [LoginController::class, 'index']);
Route::get('/dashboard', [HomeController::class, 'ShowDashboard']);

Route::get('/companies', [CompanyController::class, 'index']);
Route::resource('/companies', CompanyController::class)->middleware('auth');

Route::get('/employees', [EmployeeController::class, 'index']);
Route::get('/employees/detail', [EmployeeController::class, 'proses']);
Route::resource('/employees', EmployeeController::class)->middleware('auth');

Route::get('/login', [LoginController::class, 'index'])->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);
