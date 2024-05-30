<?php

use Illuminate\Support\Facades\Auth;

$logout = function () {
    Auth::logout();
    session()->invalidate();
    session()->regenerateToken();

    return redirect()->route('login');
}

?>

<nav class="bg-gray-800" x-data="app">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="flex h-16 items-center justify-between">
            <div class="flex">
                <img class="h-8 w-8" src="{{asset('/images/logo.png')}}">
            </div>
            <div class="hidden md:block self-center">
                <div class="ml-10 flex space-x-4">
                    <a href="{{route('welcome')}}" wire:navigate class="@if(request()->routeIs('welcome')) bg-gray-900 text-white @else text-gray-300 @endif hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium" aria-current="page">Bem Vindo</a>
                </div>
            </div>
            <div class="hidden md:block">
                <div class="ml-4 flex items-center md:ml-6">
                    <div class="relative ml-3">
                        <div x-on:click="toggleMenu">
                            <button type="button" class="relative flex max-w-xs items-center rounded-full bg-gray-800 text-sm" id="user-menu-button" aria-expanded="false" aria-haspopup="true">
                                <span class="absolute -inset-1.5"></span>
                                <span class="sr-only">Menu</span>
                                <img class="h-8 w-8 rounded-full" src="{{asset('/images/user-default.png')}}" alt="">
                            </button>
                        </div>
                        <div x-show="menu" class="absolute right-0 z-10 mt-2 w-48 origin-top-right rounded-md bg-white py-1 shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none" role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button" tabindex="-1">
                            <a href="{{route('profile')}}" wire:navigate class="@if(request()->routeIs('profile')) text-gray-700 bg-gray-200 @else text-gray-300 @endif block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem" tabindex="-1" id="user-menu-item-0">Perfil</a>
                            <a href="javascript:void(0)" wire:click="logout" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100" role="menuitem" tabindex="-1" id="user-menu-item-3">Sair</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="-mr-2 flex md:hidden" x-on:click="toggleMobileMenu">
                <button type="button" class="relative inline-flex items-center justify-center rounded-md bg-gray-800 p-2 text-gray-400 hover:bg-gray-700 hover:text-white focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800" aria-controls="mobile-menu" aria-expanded="false">
                    <span class="absolute -inset-0.5"></span>
                    <span class="sr-only">Abrir menu principal</span>
                    <svg x-show="!mobile_menu" class="block h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                    </svg>
                    <svg x-show="mobile_menu" class="block h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>
    <div class="md:hidden" x-show="mobile_menu">
        <div class="space-y-1 px-2 pb-3 pt-2 sm:px-3">
        </div>
        <div class="border-t border-gray-700 pb-3 pt-4">
            <div class="flex items-center px-5">
                <div class="flex-shrink-0">
                    <img class="h-10 w-10 rounded-full" src="{{asset('/images/user-default.png')}}" alt="">
                </div>
                <div class="ml-3">
                    <div class="text-base font-medium leading-none text-white">{{auth()->user()->name}}</div>
                    <div class="text-sm font-medium leading-none text-gray-400">{{auth()->user()->email}}</div>
                </div>
            </div>
            <div class="mt-3 space-y-1 px-2">
                <a href="{{route('profile')}}" wire:navigate class="block rounded-md px-3 py-2 text-base font-medium text-gray-400 hover:bg-gray-700 hover:text-white">Perfil</a>
                <a href="{{route('welcome')}}" wire:navigate class="block rounded-md px-3 py-2 text-base font-medium text-gray-400 hover:bg-gray-700 hover:text-white">Bem Vindo</a>
                <a  href="javascript:void(0)" wire:click="logout" class="block rounded-md px-3 py-2 text-base font-medium text-gray-400 hover:bg-gray-700 hover:text-white">Sair</a>
            </div>
        </div>
    </div>
</nav>

@section('script')
<script>
    document.addEventListener('alpine:init', () => {
        Alpine.data('app', () => ({
            menu: false,
            mobile_menu: false,

            toggleMobileMenu() {
                this.mobile_menu = ! this.mobile_menu
            },

            toggleMenu() {
                this.menu = ! this.menu
            }
        }))
    })
</script>
@endsection