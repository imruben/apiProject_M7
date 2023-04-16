<?php

namespace Database\Seeders;

use App\Models\Provider;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProviderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Provider::factory()->create([
            'name' => 'Domino\'s Pizza',
            'cif' => 'P4404199D',
            'email' => 'dominos@pizza.com',
            'phone' => fake()->phoneNumber,
            'address' => fake()->address,
        ]);

        Provider::factory()->create([
            'name' => 'Pizzas Manolo',
            'cif' => 'V13368311',
            'email' => 'manolo@pizza.com',
            'phone' => fake()->phoneNumber,
            'address' => fake()->address,
        ]);

        Provider::factory()->create([
            'name' => 'Halal Pizzas',
            'cif' => 'C01925304',
            'email' => 'amigo@pizza.com',
            'phone' => fake()->phoneNumber,
            'address' => fake()->address,
        ]);

        Provider::factory()->create([
            'name' => 'El tio peperoni',
            'cif' => 'J05556493',
            'email' => 'tiopeperonis@pizza.com',
            'phone' => fake()->phoneNumber,
            'address' => fake()->address,
        ]);

        Provider::factory()->create([
            'name' => 'Piceria Andalusa',
            'cif' => 'W1585439A',
            'email' => 'andalusia@pizza.com',
            'phone' => fake()->phoneNumber,
            'address' => fake()->address,
        ]);

        Provider::factory()->create([
            'name' => 'Pizzzzzza',
            'cif' => 'C25584673',
            'email' => 'pizzzzzza@pizza.com',
            'phone' => fake()->phoneNumber,
            'address' => fake()->address,
        ]);

        Provider::factory()->create([
            'name' => 'El masas',
            'cif' => 'V24545386',
            'email' => 'elmasas@pizza.com',
            'phone' => fake()->phoneNumber,
            'address' => fake()->address,
        ]);
    }
}
