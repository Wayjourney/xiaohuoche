<?php

namespace Database\Seeders;

use App\Enums\PayEnum;
use App\Models\Price;
use Illuminate\Database\Seeder;

class PriceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Price::create([
            'amount' => 40,
            'count' => 1
        ]);

        Price::create([
            'amount' => 150,
            'count' => 10,
            'type' => PayEnum::Charge->value
        ]);

        Price::create([
            'amount' => 200,
            'count' => 15,
            'type' => PayEnum::Charge->value
        ]);

        Price::create([
            'amount' => 300,
            'count' => 25,
            'type' => PayEnum::Charge->value
        ]);
    }
}
