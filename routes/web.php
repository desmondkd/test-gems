<?php

use App\Http\Controllers\OvertimeController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware('auth')->group(function () {
    Route::resource('overtime', OvertimeController::class);
    Route::post('/overtime/{overtime}/approve', [OvertimeController::class, 'approve'])->name('overtime.approve');
    Route::post('/overtime/{overtime}/reject', [OvertimeController::class, 'reject'])->name('overtime.reject');
    Route::get('/overtime/{overtime}/print', [OvertimeController::class, 'print'])->name('overtime.print');
    // Route::get('/overtime/report', [OvertimeController::class, 'report'])->name('overtime.report');
});