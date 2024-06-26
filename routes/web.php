<?php

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;

Route::fallback(function () {
    return Redirect::route('welcome');
});

Volt::route('/acessar', 'login')->name('login');
Volt::route('/registrar', 'register')->name('register');

Route::middleware(['auth'])->group(function () {
    Volt::route('/bem-vindo', 'welcome')->name('welcome');
    Volt::route('/perfil', 'profile')->name('profile');
});
