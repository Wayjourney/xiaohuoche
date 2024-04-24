<?php

namespace Database\Factories;

use App\Models\Price;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Income>
 */
class IncomeFactory extends Factory
{
    /**
     * The current password being used by the factory.
     */
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'price_id' => Price::factory(),
            'created_at' => fake()->dateTimeBetween('-30 day', now()),
            'updated_at' => fake()->dateTimeBetween('-30 day', now())
        ];
    }
}
