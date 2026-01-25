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