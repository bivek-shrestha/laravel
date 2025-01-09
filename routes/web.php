<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\AppointmentController;
use App\Http\Controllers\Admin\DoctorController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Admin\PatientController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\SpecializationController;
use App\Http\Controllers\MailController;
use App\Models\Slider;
use Illuminate\Support\Facades\Auth;
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


Auth::routes();



// Frontend Routes
Route::group(['as' => 'frontend.'], function () {
    Route::get('/', [HomeController::class, 'home'])->name('home');
    Route::get('/about', [HomeController::class, 'about'])->name('about');
    Route::get('/services', [HomeController::class, 'services'])->name('services');
    Route::get('/contact', [HomeController::class, 'contact'])->name('contact');
    Route::get('/specialities', [HomeController::class, 'specialities'])->name('specialities');
    Route::get('/doctor', [HomeController::class, 'doctor'])->name('doctor');
    Route::get('/appointment', [HomeController::class, 'appointment_table'])->name('appointment');
});


// Dashboard Route
Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'auth'], function () {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('patient', [PatientController::class, 'patient'])->name('patient');
    Route::get('appointment', [AppointmentController::class, 'appointment'])->name('appointment');
    Route::get('frontend', [HomeController::class, 'index'])->name('hospital');

    // Users
    Route::resource('users', UserController::class);

});

Route::prefix('admin')->name('admin.')->group(function () {
    Route::resource('doctors', DoctorController::class);
});


Route::prefix('admin')->name('admin.')->group(function () {
    Route::resource('specialization', SpecializationController::class);
    Route::resource('slider', SliderController::class);
});



Route::get('send-mail', [MailController::class,'sendEmail']);

