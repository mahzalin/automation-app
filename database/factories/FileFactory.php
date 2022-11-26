<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class FileFactory extends Factory
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
                'transaction_id' => 1,
                'size' => 3028,
                'name' => 'sample.pdf',
                'path' => 'files/tjY6lqUj7exqrEHAs2oG5GGcMuGfFnXrOUlo3ZYg.pdf',
            ],
            [
                'transaction_id' => 1,
                'size' => 3028,
                'name' => 'sample2.pdf',
                'path' => 'files/XZV8gDP9Vz6bgtdSytHfeBiMQOXd2h93vdCKOZcF.pdf',
            ],
            [
                'transaction_id' => 2,
                'size' => 3028,
                'name' => 'sample.pdf',
                'path' => 'files/tjY6lqUj7exqrEHAs2oG5GGcMuGfFnXrOUlo3ZYg.pdf',
            ],
        ];
    }
}
