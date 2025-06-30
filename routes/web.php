<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get("/", [HomeController::class, "index"])->name("home");

Route::get("admin-login", [AuthController::class, "showLoginForm"])->name("login");
Route::post("login-proccess", [AuthController::class, "login"])->name("loginProccess");


// frontend routes
Route::post("contact-form-save", [ContactController::class, "contactFormSave"])->name("contactFormSave");
