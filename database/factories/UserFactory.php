<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            [
                'id' => 1,
                'name' => 'Admin',
                'email' => 'admin@gmail.com',
                'password' => '$2y$10$g88VEUsCXBpxiySmGlide.agyVWyT3BvMcSVjMZZFxywr0AUH/.iW', // password is: 123456789
                'remember_token' => true,
                'token' => Str::random(10),
            ],
            [
                'id' => 2,
                'name' => 'Niloofar',
                'email' => 'niloofar@gmail.com',
                'password' => '$2y$10$g88VEUsCXBpxiySmGlide.agyVWyT3BvMcSVjMZZFxywr0AUH/.iW', // password is: 123456789
                'remember_token' => true,
                'token' => Str::random(10),
            ],
            [
                'id' => 3,
                'name' => fake()->name(),
                'email' => fake()->unique()->safeEmail(),
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'remember_token' => true,
                'token' => Str::random(10),
            ]
        ];
    }
}
