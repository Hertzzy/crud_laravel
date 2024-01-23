<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DocumentController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/documents/documents', function () {
    return view('documents.documents');
})->middleware(['auth', 'verified'])->name('/documents/documents');

Route::get('/documents/documents', [DocumentController::class, 'index'])->middleware(['auth', 'verified'])->name('/documents/documents');
Route::get('/documents/create', [DocumentController::class, 'create'])->middleware(['auth', 'verified'])->name('/documents/create');
Route::post('/documents', [DocumentController::class, 'store'])->middleware(['auth', 'verified'])->name('/documents');
Route::get('/documents/show/{id}', [DocumentController::class, 'show'])->middleware(['auth', 'verified'])->name('documents/{id}');
Route::put('/documents/update/{id}', [DocumentController::class, 'update'])->middleware(['auth', 'verified'])->name('/documents/update/{id}');
Route::get('/documents/{id}', [DocumentController::class, 'destroy'])->middleware(['auth', 'verified'])->name('documents/{id}');




Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::get('/profile/create', [ProfileController::class, 'create'])->name('/profile/create');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
