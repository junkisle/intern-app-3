<?php

use App\Http\Controllers\ProfileController;

use App\Http\Controllers\TaskController;
use App\Http\Controllers\NoteController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');


})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    //Route-Tasks
    Route::get('/tasks', [TaskController::class, 'index'])->name('intern.task.index');
    Route::get('/create/user/{user_id}', [TaskController::class, 'create'])->name('intern.task.create');
    Route::post('/store', [TaskController::class, 'store'])->name('intern.task.store');
    Route::get('/edit/{task}', [TaskController::class, 'edit'])->name('intern.task.edit');
    Route::put('/update/{task}', [TaskController::class, 'update'])->name('intern.task.update');
    Route::put('/update-status/{task}', [TaskController::class, 'updateStatus'])->name('intern.task.update-status');
    Route::delete('/destroy/{task}', [TaskController::class, 'destroy'])->name('intern.task.destroy');

    //Route-Notes
    Route::get('/notes', [NoteController::class, 'index'])->name('intern.note.index');

});

require __DIR__.'/auth.php';
