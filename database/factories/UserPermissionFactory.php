<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserPermissionFactory extends Factory
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
                'user_id' => 1,
                'model_type' => User::class,
                'permission_id' => 1,
            ],
            [
                'user_id' => 1,
                'model_type' => User::class,
                'permission_id' => 2,
            ],
            [
                'user_id' => 1,
                'model_type' => User::class,
                'permission_id' => 3,
            ],
        ];
    }
}
