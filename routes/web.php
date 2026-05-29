<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProjectController;
use Illuminate\Support\Facades\Route;

// Page principale du portfolio
Route::get('/', [HomeController::class, 'index'])->name('home');

// Page tous les projets
Route::get('/projets', [ProjectController::class, 'index'])->name('projects.index');

// Formulaire de contact
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');