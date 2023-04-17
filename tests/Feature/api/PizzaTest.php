<?php

namespace Tests\Feature\api;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Laravel\Passport\Passport;
use App\Models\User;

class PizzaTest extends TestCase
{
    public function test_index(): void
    {
        Passport::actingAs(
            User::find(1)
        );

        $response = $this->get('http://localhost:8000/api/pizzas');

        $response->assertStatus(200);
    }

    public function test_show(): void
    {
        Passport::actingAs(
            User::find(1)
        );

        $response = $this->get('http://localhost:8000/api/pizzas/1');

        $response->assertStatus(201);
    }

    public function test_showProvider(): void
    {
        Passport::actingAs(
            User::find(1)
        );

        $response = $this->get('http://localhost:8000/api/pizzas/provider/1');

        $response->assertStatus(201);
    }

    public function test_store(): void
    {
        Passport::actingAs(
            User::find(1)
        );

        $response = $this->post('http://localhost:8000/api/pizzas', [
            'name' => 'Test Pizza',
            'amount' => 1,
            'price' => 1.99,
            'provider' => 1
        ]);

        $response->assertStatus(201);
    }

    public function test_edit(): void
    {
        Passport::actingAs(
            User::find(1)
        );

        $response = $this->put('http://localhost:8000/api/pizzas', [
            'id' => 5,
            'name' => 'Pizza cinco quesos',
            'amount' => 96,
            'price' => 69.99,
            'provider' => 2
        ]);

        $response->assertStatus(201);
    }

    public function test_destroy(): void
    {
        Passport::actingAs(
            User::find(1)
        );

        $response = $this->delete('http://localhost:8000/api/pizzas/10');

        $response->assertStatus(201);
    }
}
