<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Запускаем TaskSeeder
        $this->call(TaskSeeder::class);
    }
}
