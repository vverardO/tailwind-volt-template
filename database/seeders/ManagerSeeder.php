<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class ManagerSeeder extends Seeder
{
    public function run(): void
    {
        User::factory()
            ->count(1)
            ->create([
                'role' => 'manager',
            ]);
    }
}
