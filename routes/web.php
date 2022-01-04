<?php

use App\Http\Controllers\studentController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', [studentController::class,'index'])->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/create-student', [studentController::class,'create'])->middleware(['auth', 'verified'])->name('create_student');
Route::post('/create-student',[studentController::class,'store'])->middleware(['auth', 'verified'])->name('store_student');
Route::delete('/delete-student/{id}',[studentController::class,'destroy'])->middleware(['auth', 'verified'])->name('delete_student');
Route::get('/edit-student/{id}',[studentController::class,'edit'])->middleware(['auth', 'verified'])->name('edit_student');
Route::put('/update-student/{id}',[studentController::class,'update'])->middleware(['auth', 'verified'])->name('update_student');
Route::get('/dashboard/{item}',[studentController::class,'search'])->middleware(['auth', 'verified'])->name('searchFor');

require __DIR__.'/auth.php';
