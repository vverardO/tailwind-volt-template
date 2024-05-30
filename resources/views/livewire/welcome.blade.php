<?php

use function Livewire\Volt\{state, title};

title('Bem Vindo');

state(['today' => now()->today()->format('d/m/Y')]);

?>

<div>
    <div class="flex flex-row justify-center">
        <h2 class="text-2xl font-semibold leading-7 text-gray-900">Santa Maria, {{$today}}</h2>
    </div>
</div>