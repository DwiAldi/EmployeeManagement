<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\HomeController;
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

Route::get('/', [HomeController::class, 'index']);

Route::prefix('admin')
    ->namespace('Admin')
    // ->middleware('auth','admin')
    ->group(function(){
        //127.0.0.0/admin/
        Route::get('/', [DashboardController::class, 'index'])
            ->name('dashboard');
<<<<<<< Updated upstream
=======

        Route::resource('employee', '\App\Http\Controllers\Admin\EmployeeController');
        Route::resource('leave', '\App\Http\Controllers\Admin\LeaveController');
>>>>>>> Stashed changes
    });

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
