<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\HomeController;
use Carbon\Carbon;

Route::group(['middleware' => 'translate'], function () {
	Route::resource('departments', DepartmentController::class)->except(['show']);
	Route::resource('staffs', StaffController::class)->except(['show']);
});
Route::get('lang/{lang}', [HomeController::class, 'index'])->name('lang');
