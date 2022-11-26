<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeders.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
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

        foreach ($permissions as $permission) {
            Permission::create($permission);
        }
    }
}
