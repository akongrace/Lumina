<?php 
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;

route::resource('students', StudentController::class);
Route::patch('/students/{id}/restore', [StudentController::class, 'restore'])->name('students.restore');