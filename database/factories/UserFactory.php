<?php

namespace Database\Factories;

use App\Enums\UserRole;
use App\Enums\UserStatus;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

class UserFactory extends Factory
{
    public function definition(): array
    {
        $role = fake()->boolean() ? 'manager' : 'user';

        return [
            'name' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'password' => Hash::make('password'),
            'role' => $role,
            'status' => fake()->boolean(),
        ];
    }

    public function activate(): Factory
    {
        return $this->state(function () {
            return [
                'status' => UserStatus::Active,
            ];
        });
    }

    public function user(): Factory
    {
        return $this->state(function () {
            return [
                'role' => UserRole::User,
            ];
        });
    }

    public function manager(): Factory
    {
        return $this->state(function () {
            return [
                'role' => UserRole::Manager,
            ];
        });
    }
}
