<?php

namespace Database\Factories;

use App\Models\Invoice;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $invoice = Invoice::factory()->create();

        return [
            'invoice_id' => $invoice->id,
            'name' => $this->faker->word(),
            'quantity' => $this->faker->numberBetween(1, 1000),
            'price' => $this->faker->randomFloat(2, 1, 9999),
            'created_at' => Carbon::now()->toDateTimeString()
        ];
    }
}
