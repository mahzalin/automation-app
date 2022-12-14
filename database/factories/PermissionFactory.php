<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class PermissionFactory extends Factory
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
                'title' => 'payment_list',
                'guard_name' => 'api',
            ],
            [
                'id' => 2,
                'title' => 'payment_edit',
                'guard_name' => 'api',
            ],
            [
                'id' => 3,
                'title' => 'payment_status_changing',
                'guard_name' => 'api',
            ],
        ];
    }
}
