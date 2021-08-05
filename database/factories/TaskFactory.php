<?php

namespace Database\Factories;

use App\Models\Log;
use App\Models\Task;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

class TaskFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Task::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $user = User::factory()->create();
        
        return [
            'user_id' => $user->id,
            'title' => $this->faker->title(),
            'description' => $this->faker->paragraph(2),
            'expired_at' => Carbon::now()->addDays(1),
            'created_at' => Carbon::now()->toDateTimeString()
        ];
    }


    /**
     * Configure the model factory.
     *
     * @return $this
     */
    public function configure()
    {
        return $this->afterCreating(function (Task $task) {
            Log::factory()->create([
                'task_id' => $task->id,
                'user_id' => $task->user_id,
            ]);
        });
    }
}
