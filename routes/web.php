<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ContactController;
use Illuminate\Support\Facades\Route;

// Page principale du portfolio
Route::get('/', [HomeController::class, 'index'])->name('home');

// Formulaire de contact
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');