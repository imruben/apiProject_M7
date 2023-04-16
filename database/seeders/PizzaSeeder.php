<?php

namespace Database\Seeders;

use App\Models\Pizza;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PizzaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Pizza::factory()->create([
            'name' => 'The Fun Pizza',
            'amount' => '25',
            'price' => '4.99',
        ]);

        Pizza::factory()->create([
            'name' => 'The Super Mushroom Pizza',
            'amount' => '30',
            'price' => '3.99',
        ]);

        Pizza::factory()->create([
            'name' => 'Neapolitan Pizza',
            'amount' => '42',
            'price' => '8.99',
        ]);

        Pizza::factory()->create([
            'name' => 'Chicago Pizza',
            'amount' => '5',
            'price' => '6.49',
        ]);

        Pizza::factory()->create([
            'name' => 'New York-Style Pizza',
            'amount' => '17',
            'price' => '7.49',
        ]);

        Pizza::factory()->create([
            'name' => 'Sicilian Pizza',
            'amount' => '24',
            'price' => '7.49',
        ]);

        Pizza::factory()->create([
            'name' => 'Greek Pizza',
            'amount' => '19',
            'price' => '6.99',
        ]);

        Pizza::factory()->create([
            'name' => 'California Pizza',
            'amount' => '15',
            'price' => '6.99',
        ]);

        Pizza::factory()->create([
            'name' => 'Detroit Pizza',
            'amount' => '45',
            'price' => '4.99',
        ]);

        Pizza::factory()->create([
            'name' => 'St. Louis Pizza',
            'amount' => '36',
            'price' => '9.99',
        ]);
    }
}
