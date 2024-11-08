<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\LoanController;
use App\Http\Controllers\LoanScheduleController;
use App\Http\Controllers\LocalizationController;
use Illuminate\Support\Facades\Route as ro;

ro::get('/', function () {
    return view('welcome');
});

// 
ro::get('/locale/{lang}', [LocalizationController::class, LocalizationController::class, 'setLocale'])->name('locale');

ro::resource('/customers', CustomerController::class);
ro::resource('/loans', LoanController::class);
ro::resource('/schedule', LoanScheduleController::class);
