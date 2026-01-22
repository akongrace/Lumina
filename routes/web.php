<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\UserController;  




Route::get('/', function () { return view('welcome');});


require __DIR__.'/auth.php';

/*
|--------------------------------------------------------------------------
| Authenticated Users
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->group(function () {

    Route::get('/dashboard', function () {
        return auth()->user()->role === 'Admin'
            ? redirect()->route('admin.dashboard')
            : redirect()->route('teacher.dashboard');
    })->name('dashboard');

    Route::get('/admin/dashboard', fn () => view('dashboard'))
        ->name('admin.dashboard');

    Route::get('/teacher/dashboard', fn () => view('dashboard'))
        ->name('teacher.dashboard');

    Route::get('/profile', fn () => view('profile.edit'))
        ->name('profile.edit');

    Route::get('/students', [StudentController::class, 'index'])
        ->name('students.index');

    Route::get('/students/{student}', [StudentController::class, 'show'])
        ->name('students.show');
});

/*
|--------------------------------------------------------------------------
| Admin Only
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'admin'])->group(function () {

    Route::get('/students/create', [StudentController::class, 'create'])
        ->name('students.create');

    Route::post('/students', [StudentController::class, 'store'])
        ->name('students.store');

    Route::get('/students/{student}/edit', [StudentController::class, 'edit'])
        ->name('students.edit');

    Route::put('/students/{student}', [StudentController::class, 'update'])
        ->name('students.update');

    Route::delete('/students/{student}', [StudentController::class, 'destroy'])
        ->name('students.destroy');

    Route::patch('/students/{id}/restore', [StudentController::class, 'restore'])
        ->name('students.restore');
});
