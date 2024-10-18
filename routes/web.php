<?php

use App\Http\Controllers\DoctorController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('dashboard.index');
});

Route::get('/dashboard', function () {
    return view('dashboard.index');
});

// Route::get('/doctor', [DoctorController::class, 'index']);
// Route::get('/doctor/create', [DoctorController::class, 'create']);
// Route::get('/doctor/{id}', [DoctorController::class, 'show']);
// Route::get('/doctor/{id}/edit', [DoctorController::class, 'edit']);
// Route::post('doctor', [DoctorController::class, 'store']);
// Route::put('doctor/{id}', [DoctorController::class, 'update']);
// Route::delete('doctor/{id}', [DoctorController::class, 'destroy']);

// bisa semua
Route::resource('doctor', DoctorController::class);

//untuk semua tapi ada yang tidak mau dimasukkan, gunakan except
// Route::resource('doctor', DoctorController::class)->except('show');

//untuk dipakai index saja
// Route::resource('doctor', DoctorController::class)-only('index');
