<?php

namespace Database\Seeders;

use App\Models\File;
use Illuminate\Database\Seeder;

class FileTableSeeder extends Seeder
{
    /**
     * Run the database seeders.
     *
     * @return void
     */
    public function run()
    {
        $files = [
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

        foreach ($files as $file) {
            File::create($file);
        }
    }
}
