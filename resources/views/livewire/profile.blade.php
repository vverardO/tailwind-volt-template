<?php

use Illuminate\Support\Facades\Hash;

use function Livewire\Volt\{mount, rules, state, title};

title('Perfil');

state(['user', 'name', 'email', 'password', 'role']);
rules([
    'name' => ['required'],
    'email' => ['required'],
    'password' => ['sometimes'],
])->messages([
    'name.required' => 'Insira seu nome',
    'email.required' => 'Insira seu email',
    'phone.size' => 'Formato inválido',
]);

mount(function () {
    $this->user = auth()->user();

    $this->name = $this->user->name;
    $this->email = $this->user->email;
    $this->phone = $this->user->phone;
    $this->role = $this->user->role;
});

$store = function () {
    $this->validate();

    if ($this->password) {
        $this->user->password = Hash::make($this->password);
    }

    $this->user->name = $this->name;
    $this->user->email = $this->email;
    $this->user->role = $this->role ?? null;

    $this->user->save();

    $this->dispatch(
        'alert',
        type: 'success',
        message: 'Perfil atualizado com sucesso!'
    );
}

?>

<form  wire:submit="store" class="w-full bg-white border border-gray-200 rounded-lg shadow p-5">
    <div class="border-b border-gray-900/10">
        <h2 class="text-base font-semibold leading-7 text-gray-900">Informações Pessoais</h2>
        <p class="mt-1 text-sm leading-6 text-gray-600">Use informações verdadeiras.</p>
        <div class="mt-5 mb-5 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
            <div class="sm:col-span-3">
                <label class="block text-sm font-medium leading-6 text-gray-900">Nome</label>
                <div class="mt-2">
                    <input type="text" wire:model="name" placeholder="antonio" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset placeholder:text-gray-400 pl-[14px] pr-[14px] focus:ring-2 focus:ring-inset @error('name') focus:ring-red-600 ring-red-300  @else focus:ring-indigo-600 ring-gray-300 @enderror sm:text-sm sm:leading-6">
                </div>
                @error('name') <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p> @enderror
            </div>
            <div class="sm:col-span-3">
                <label class="block text-sm font-medium leading-6 text-gray-900">Email</label>
                <div class="mt-2">
                    <input type="text" wire:model="email" placeholder="antonio@gmail.com" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset placeholder:text-gray-400 pl-[14px] pr-[14px] focus:ring-2 focus:ring-inset @error('email') focus:ring-red-600 ring-red-300  @else focus:ring-indigo-600 ring-gray-300 @enderror sm:text-sm sm:leading-6">
                </div>
                @error('name') <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p> @enderror
            </div>
        </div>
        <div class="mt-5 mb-5 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
            <div class="sm:col-span-3">
                <label class="block text-sm font-medium leading-6 text-gray-900">Senha</label>
                <div class="mt-2">
                    <input type="password" wire:model="password" placeholder="********" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset placeholder:text-gray-400 pl-[14px] pr-[14px] focus:ring-2 focus:ring-inset @error('password') focus:ring-red-600 ring-red-300  @else focus:ring-indigo-600 ring-gray-300 @enderror sm:text-sm sm:leading-6">
                </div>
                @error('password') <p class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</p> @enderror
            </div>
            <div class="sm:col-span-3">
                <label class="block text-sm font-medium leading-6 text-gray-900">Papel</label>
                <select wire:model="type" disabled class="mt-2 bg-gray-50 border border-gray-300 text-gray-900 rounded-md focus:ring-blue-500 focus:border-blue-500 block sm:text-sm w-full">
                    <option value="user">Usuário</option>
                    <option value="manager">Gestor</option>
                </select>
            </div>
        </div>
    </div>
    <div class="mt-6 flex items-center justify-end gap-x-6">
        <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Atualizar</button>
    </div>
</form>
