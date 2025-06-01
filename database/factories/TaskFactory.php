<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Task;


class TaskFactory extends Factory
{
    
    protected $model = Task::class;

    public function definition(): array
    {
        $statuses = ['pending', 'in_progress', 'done'];
    
        $dueDate = $this->faker->optional()->dateTimeBetween('now', '+1 month');
        return [
            'title' => $this->faker->sentence(3),
            'description' => $this->faker->paragraph(),
            'status' => $this->faker->randomElement($statuses),
            'due_date' => $dueDate ? $dueDate->format('Y-m-d') : null,
        ];
    }
}    
