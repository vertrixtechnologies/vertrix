<?php

use App\Http\Controllers\AssessmentController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application.
|
*/

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::post('/assessment', [AssessmentController::class, 'store'])->name('assessment.store');
