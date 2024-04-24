<?php

namespace Database\Seeders;

use App\Models\Income;
use App\Models\Price;
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
        $price40 = Price::factory()->create([
            'amount' => 40,
            'count' => 1
        ]);
        $price150 = Price::factory()->create([
            'amount' => 150,
            'count' => 10
        ]);
        $price200 =Price::factory()->create([
            'amount' => 200,
            'count' => 15
        ]);
        $price300 =Price::factory()->create([
            'amount' => 300,
            'count' => 25
        ]);


        $this->call([
            UserSeeder::class
        ]);

        $prices = Price::all();
        Income::factory()->count(10)->for($price40)->for(User::first())->create();
        Income::factory()->count(10)->for($price150)->for(User::all()[1])->create();
        Income::factory()->count(10)->for($price200)->for(User::all()[2])->create();
        Income::factory()->count(10)->for($price300)->for(User::all()[3])->create();
    }
}
