<?php

use App\Http\Controllers\QrController;
use App\Http\Controllers\StaffController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Royesute;

//API Routes
Route::post('/staff/verify-otp', [StaffController::class, 'verifyOtp'])->name('staff.verifyOtp');
Route::post('/staff/verify-qr', [StaffController::class, 'verify'])->name('staff.verifyqr');
Route::post('/staff/login', [StaffController::class, 'login'])->name('staff.api.login');




