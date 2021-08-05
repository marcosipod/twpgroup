<?php

namespace Database\Factories;

use App\Models\Invoice;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

class InvoiceFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Invoice::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $user = User::factory()->create();

        return [
            'seller_id' => $user->id,
            'user_id' => $user->id,
            'date' => Carbon::now()->toDateTimeString(),
            'type' => $this->faker->title(),
            'total' => 0,
            'created_at' => Carbon::now()->toDateTimeString()
        ];
    }
}
