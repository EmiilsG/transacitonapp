<?php

use App\Http\Controllers\InternshipApplicationController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/apply', [InternshipApplicationController::class, 'create']);
Route::post('/apply', [InternshipApplicationController::class, 'store']);
