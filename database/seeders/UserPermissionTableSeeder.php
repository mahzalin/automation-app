<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\UserPermission;
use Illuminate\Database\Seeder;

class UserPermissionTableSeeder extends Seeder
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

        foreach ($users as $user) {
            UserPermission::create($user);
        }
    }
}
