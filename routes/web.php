<?php

use App\Http\Controllers\PasteController;
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
Route::get('/settings/two-factor', function () {return view('settings.two-factor');})->middleware(['auth'])->name('settings.two-factor');