<?php 
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;

route::resource('students', StudentController::class);