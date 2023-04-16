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
            'name' => 'Happizza',
            'amount' => '25',
            'price' => '4.99',
            'provider' => 6
        ]);

        Pizza::factory()->create([
            'name' => 'Pizza Brocoli',
            'amount' => '30',
            'price' => '3.99',
            'provider' => 1
        ]);

        Pizza::factory()->create([
            'name' => 'Pizza de la meca',
            'amount' => '42',
            'price' => '8.99',
            'provider' => 3
        ]);

        Pizza::factory()->create([
            'name' => 'Pizza Mubarak',
            'amount' => '5',
            'price' => '6.49',
            'provider' => 3
        ]);

        Pizza::factory()->create([
            'name' => 'Pizza cuatro quesos',
            'amount' => '17',
            'price' => '7.49',
            'provider' => 2
        ]);

        Pizza::factory()->create([
            'name' => 'Pepperoni Estrella',
            'amount' => '24',
            'price' => '7.49',
            'provider' => 4
        ]);

        Pizza::factory()->create([
            'name' => 'Hawaiana',
            'amount' => '19',
            'price' => '6.99',
            'provider' => 1
        ]);

        Pizza::factory()->create([
            'name' => 'Pizza de callos',
            'amount' => '15',
            'price' => '6.99',
            'provider' => 2
        ]);

        Pizza::factory()->create([
            'name' => 'Pizza de gazpacho',
            'amount' => '45',
            'price' => '4.99',
            'provider' => 5
        ]);

        Pizza::factory()->create([
            'name' => 'Pizza de pimientos',
            'amount' => '36',
            'price' => '9.99',
            'provider' => 2
        ]);

        Pizza::factory()->create([
            'name' => 'Pizza de espinacas',
            'amount' => '36',
            'price' => '9.99',
            'provider' => 1
        ]);

        Pizza::factory()->create([
            'name' => 'Pizza kebab',
            'amount' => '36',
            'price' => '9.99',
            'provider' => 3
        ]);

        Pizza::factory()->create([
            'name' => 'Salchipizza',
            'amount' => '36',
            'price' => '9.99',
            'provider' => 3
        ]);

        Pizza::factory()->create([
            'name' => 'Pizza triple masa',
            'amount' => '36',
            'price' => '9.99',
            'provider' => 7
        ]);

        Pizza::factory()->create([
            'name' => 'Pizza snorlax',
            'amount' => '36',
            'price' => '9.99',
            'provider' => 6
        ]);

        Pizza::factory()->create([
            'name' => 'Pizza de paella',
            'amount' => '36',
            'price' => '19.99',
            'provider' => 7
        ]);

        Pizza::factory()->create([
            'name' => 'Pizza de croquetas',
            'amount' => '36',
            'price' => '9.99',
            'provider' => 4
        ]);

        Pizza::factory()->create([
            'name' => 'Pizza de gambas',
            'amount' => '36',
            'price' => '9.99',
            'provider' => 4
        ]);

        Pizza::factory()->create([
            'name' => 'Pizza de calamares',
            'amount' => '36',
            'price' => '7.99',
            'provider' => 5
        ]);

        Pizza::factory()->create([
            'name' => 'Pizza de nachos',
            'amount' => '36',
            'price' => '14.99',
            'provider' => 1
        ]);
    }
}
