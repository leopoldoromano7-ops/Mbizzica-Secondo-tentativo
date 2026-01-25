<?php

use App\Http\Controllers\PasteController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PublicController;
use Illuminate\Support\Facades\Route;

//View homepage / welcome
Route::get('/', [PublicController::class, 'home'])->name('homepage');

//Paste routes
Route::get('pastes/index', [PasteController::class, 'index'])->name('pastes.index');
Route::get('pastes/create', [PasteController::class, 'create'])->name('pastes.create');
Route::post('paste/store', [PasteController::class, 'store'])->name('paste.store');

// [aste download route
Route::get('/paste/download/{id}', [PasteController::class, 'download'])->name('paste.download');


//trotta per abbilitare l'autenticazione a due fattori

Route::get('/settings/two-factor', [ProfileController::class, 'twoFactor'])->middleware(['auth'])->name('settings.two-factor');
//Rotta per reimpostare password https://chatgpt.com/c/697641b2-79b0-8325-af08-1c7b0c52948f
Route::get('/forgot-password', function () {return view('auth.forgot-password');})->middleware('guest')->name('password.request');
Route::post('/forgot-password', [ProfileController::class, 'ResetPass'])->middleware('guest')->name('password.email');

//url univocas
Route::get('/paste/{url}', [PasteController::class, 'show'])->name('paste.show');