<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Task;  // не забудь импортировать модель

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
{
    \App\Models\Task::factory()->count(20)->create();
}

}
