<?php

use Livewire\Volt\Volt;

Volt::route('/acessar', 'login')->name('login');
Volt::route('/registrar', 'register')->name('register');
Volt::route('/bem-vindo', 'welcome')->name('welcome');
Volt::route('/perfil', 'profile')->name('profile');
