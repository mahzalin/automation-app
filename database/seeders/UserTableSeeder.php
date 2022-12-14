<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeders.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'name' => 'Admin',
                'email' => 'admin@gmail.com',
                'password' => '$2y$10$g88VEUsCXBpxiySmGlide.agyVWyT3BvMcSVjMZZFxywr0AUH/.iW', // password is: 123456789
                'remember_token' => true,
                'token' => Str::random(10),
            ],
            [
                'name' => 'Niloofar',
                'email' => 'niloofar@gmail.com',
                'password' => '$2y$10$BSg8Cp2B6FIGW84ooTGEO.cbRMheC.klJzpwYPh7NQewkgjyhb1Iy', // password
                'remember_token' => true,
                'token' => Str::random(10),
            ],
            [
                'name' => fake()->name(),
                'email' => fake()->unique()->safeEmail(),
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'remember_token' => true,
                'token' => Str::random(10),
            ]
        ];

        foreach ($users as $user) {
            User::create($user);
        }
    }
}
