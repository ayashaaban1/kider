<?php

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::fallback(Controller::class);

Route::get('index',[Controller::class,'index'])->name('index');
Route::get('about',[Controller::class,'about'])->name('about');
Route::get('classes',[Controller::class,'classes'])->name('classes');
Route::get('contact',[Controller::class,'contact'])->name('contact');
Route::get('facilities',[Controller::class,'facilities'])->name('facilities');
Route::get('teacher',[Controller::class,'teacher'])->name('teacher');
Route::get('beTeacher',[Controller::class,'call'])->name('beTeacher');
Route::get('appointment',[Controller::class,'appointment'])->name('appointment');
Route::get('testimonial',[Controller::class,'testimonial'])->name('testimonial');
