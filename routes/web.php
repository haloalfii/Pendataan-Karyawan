<?php

use App\Models\Employee;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\EmployeeController;

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

Route::get('/', [HomeController::class, 'ShowDashboard']);
Route::get('/companies', [CompanyController::class, 'index']);
Route::get('/employees', [EmployeeController::class, 'index']);

Route::get('/login', [LoginController::class, 'index']);
