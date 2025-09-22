<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(10)->create()->each(function ($user) {
            $user->tasks()->saveMany(\App\Models\Task::factory(rand(3, 15))->create(['user_id' => $user->id])->each(function ($task) {
                $task->notes()->saveMany(\App\Models\Note::factory(rand(3, 15))->create(['task_id' => $task->id]));
            }));
        });

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
    }
}
