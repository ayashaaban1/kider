<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\TestimonialController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\SubjectController;

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

Route::group(['prefix' => 'admin', "as" => "admin"], function () {
    Route::group(['prefix' => 'testimonial', 'as' => '.testimonial.'], function () {
        Route::get('create', [TestimonialController::class, 'create'])->name('create');
        Route::post('store', [TestimonialController::class, 'store'])->name('store');
        Route::get('list', [TestimonialController::class, 'index'])->name('list');
        Route::get('edit/{id}', [TestimonialController::class, 'edit'])->name('edit');
        Route::put('update/{id}', [TestimonialController::class, 'update'])->name('update');
        Route::get('delete/{id}', [TestimonialController::class,'destroy'])->name('delete');
    });
    Route::group(['prefix' => 'contact', 'as' => '.contact.'], function () {
        Route::get('list', [ContactController::class, 'index'])->name('list');
        Route::get('delete/{id}', [ContactController::class,'destroy'])->name('delete');
        Route::get('show/{id}', [ContactController::class, 'show'])->name('show');
        Route::get('unread', [ContactController::class, 'unread'])->name('unread');
    });
    Route::group(['prefix' => 'appointment', 'as' => '.appointment.'], function () {
        Route::get('list', [AppointmentController::class, 'index'])->name('list');
        Route::get('delete/{id}', [AppointmentController::class,'destroy'])->name('delete');
        Route::get('show/{id}', [AppointmentController::class, 'show'])->name('show');
    });
    Route::group(['prefix' => 'teacher', 'as' => '.teacher.'], function () {
        Route::get('create', [TeacherController::class, 'create'])->name('create');
        Route::post('store', [TeacherController::class, 'store'])->name('store');
        Route::get('list', [TeacherController::class, 'index'])->name('list');
        Route::get('edit/{id}', [TeacherController::class, 'edit'])->name('edit');
        Route::put('update/{id}', [TeacherController::class, 'update'])->name('update');
        Route::get('delete/{id}', [TeacherController::class,'destroy'])->name('delete');
    });
    Route::group(['prefix' => 'subject', 'as' => '.subject.'], function () {
        Route::get('create', [SubjectController::class, 'create'])->name('create');
        Route::post('store', [SubjectController::class, 'store'])->name('store');
        Route::get('list', [SubjectController::class, 'index'])->name('list');
        Route::get('edit/{id}', [SubjectController::class, 'edit'])->name('edit');
        Route::put('update/{id}', [SubjectController::class, 'update'])->name('update');
        Route::get('delete/{id}', [SubjectController::class,'destroy'])->name('delete');
    });
})->middleware('verified');    
