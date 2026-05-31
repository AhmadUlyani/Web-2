<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;

Route::get('/', [PageController::class, 'home'])->name('home');

Route::get('/profile', [PageController::class, 'profile'])->name('profile');

Route::get('/experience/{id}', [PageController::class, 'detailExperience'])->name('experience.detail');