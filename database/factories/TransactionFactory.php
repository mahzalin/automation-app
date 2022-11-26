<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class TransactionFactory extends Factory
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
                'sender_id' => 1,
                'receiver_id' => 2,
                'amount' => 1000000,
                'status' => 1,
            ],
            [
                'sender_id' => 2,
                'receiver_id' => 1,
                'amount' => 2500000,
                'status' => 2,
            ],
            [
                'sender_id' => 1,
                'receiver_id' => 2,
                'amount' => 3000000,
                'status' => 0,
            ],
        ];
    }
}
