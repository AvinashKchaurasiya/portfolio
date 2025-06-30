<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;


Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('login-proccess', [AuthController::class, 'login'])->name('loginProccess');

    Route::middleware('isAdminLogin')->group(function () {
        Route::get('dashboard', [AuthController::class, 'dashboard'])->name('dashboard');
    });
});


// frontend routes
Route::get("/", [HomeController::class, "index"])->name("home");
Route::post("contact-form-save", [ContactController::class, "contactFormSave"])->name("contactFormSave");
Route::get("thank-you", [ContactController::class, "thankYou"])->name("thankYou");
