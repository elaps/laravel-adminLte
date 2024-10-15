<?php

use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;

Route::view('/', 'welcome')->name('welcome');

Volt::route('dashboard', 'pages.dashboard.index')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');
Volt::route('dashboard2', 'pages.dashboard.index2')
    ->middleware(['auth', 'verified'])
    ->name('dashboard2');
Volt::route('dashboard3', 'pages.dashboard.index3')
    ->middleware(['auth', 'verified'])
    ->name('dashboard3');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__.'/auth.php';
