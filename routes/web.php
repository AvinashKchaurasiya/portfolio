<?php

use App\Http\Controllers\Admin\ClientController;
use App\Http\Controllers\Admin\ContactController as AdminContactController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ExperinceController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\SkillController;
use App\Http\Controllers\Admin\TechnologyController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;


Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('login-proccess', [AuthController::class, 'loginProcess'])->name('loginProccess');

    Route::middleware('isAdminLogin')->group(function () {
        Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

        // clients routes
        Route::get('clients', [ClientController::class, 'Index'])->name('clients');
        Route::post('client-save', [ClientController::class, 'clientSave'])->name('clientSave');
        Route::get('edit-client/{id}', [ClientController::class, 'editClient'])->name('editClient');
        Route::post('update-client/{id}', [ClientController::class, 'updateClient'])->name('updateClient');
        Route::delete('delete-client/{id}', [ClientController::class, 'deleteClient'])->name('deleteClient');

        //skills routes
        Route::get('skills', [SkillController::class, 'Index'])->name('skills');
        Route::post('skills-save', [SkillController::class, 'skillSave'])->name('skillSave');
        Route::get('edit-skill/{id}', [SkillController::class, 'editSkill'])->name('editSkill');
        Route::post('update-skill/{id}', [SkillController::class, 'updateSkill'])->name('updateSkill');
        Route::delete('delete-skill/{id}', [SkillController::class, 'deleteSkill'])->name('deleteSkill');

        // technology routes
        Route::get('technology', [TechnologyController::class, "Index"])->name('technology');
        Route::post('technology-save', [TechnologyController::class, "technologySave"])->name('technologySave');
        Route::get('edit-technology/{id}', [TechnologyController::class, "editTechnology"])->name('editTechnology');
        Route::post('update-technology/{id}', [TechnologyController::class, "updateTechnology"])->name('updateTechnology');
        Route::delete('delete-technology/{id}', [TechnologyController::class, "deleteTechnology"])->name('deleteTechnology');

        // services routes
        Route::get('services', [ServiceController::class, 'Index'])->name('services');
        Route::post('service-save', [ServiceController::class, 'serviceSave'])->name('serviceSave');
        Route::get('edit-service/{id}', [ServiceController::class, 'editService'])->name('editService');
        Route::post('update-service/{id}', [ServiceController::class, 'updateService'])->name('updateService');
        Route::delete('delete-service/{id}', [ServiceController::class, 'deleteService'])->name('deleteService');
        Route::post('update-status/{id}', [ServiceController::class, 'updateStatus'])->name('updateStatus');

        // experience routes
        Route::get('experiences', [ExperinceController::class, 'Index'])->name('experiences');
        Route::get('experience-create', [ExperinceController::class, 'createExperience'])->name('createExperience');
        Route::post('experience-save', [ExperinceController::class, 'experienceSave'])->name('experienceSave');
        Route::get('edit-experience/{id}', [ExperinceController::class, 'editExperience'])->name('editExperience');
        Route::put('update-experience/{id}', [ExperinceController::class, 'updateExperience'])->name('updateExperience');
        Route::delete('delete-experience/{id}', [ExperinceController::class, 'deleteExperience'])->name('deleteExperience');

        // contact routes
        Route::get('contact-form-details', [AdminContactController::class, 'Index'])->name('contactFormDetails');
    });
});


// frontend routes
Route::get("/", [HomeController::class, "index"])->name("home");
Route::post("contact-form-save", [ContactController::class, "contactFormSave"])->name("contactFormSave");
Route::get("thank-you", [ContactController::class, "thankYou"])->name("thankYou");
