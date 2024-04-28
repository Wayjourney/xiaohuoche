<?php

namespace Database\Factories;

use App\Models\Price;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Income>
 */
class ReceiptFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'operator_id' => User::factory(),
            'valid' => 1,
            'created_at' => fake()->dateTimeBetween('-30 day', now()),
            'updated_at' => fake()->dateTimeBetween('-30 day', now())
        ];
    }
}
