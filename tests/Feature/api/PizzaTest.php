<?php

namespace Tests\Feature\api;

use App\Models\Pizza;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Laravel\Passport\Passport;
use App\Models\User;

class PizzaTest extends TestCase
{

    //test respuestas correctas

    //INDEX
    public function test_index(): void
    {
        Passport::actingAs(
            User::factory()->create()
        );

        $response = $this->get('http://localhost:8000/api/pizzas');

        $response->assertStatus(200);
    }

    //SHOW
    public function test_show(): void
    {
        Passport::actingAs(
            User::factory()->create()
        );

        $response = $this->get('http://localhost:8000/api/pizzas/1');

        $response->assertStatus(201);
    }

    //SHOW PROVIDER
    public function test_showProvider(): void
    {
        Passport::actingAs(
            User::factory()->create()
        );

        $response = $this->get('http://localhost:8000/api/pizzas/provider/1');

        $response->assertStatus(201);
    }

    //STORE
    public function test_store(): void
    {
        Passport::actingAs(
            User::factory()->create()
        );

        $response = $this->post('http://localhost:8000/api/pizzas', [
            'name' => 'Test Pizza',
            'amount' => 1,
            'price' => 1.99,
            'provider' => 1
        ]);

        $response->assertStatus(201);
    }

    //UPDATE
    public function test_update(): void
    {
        Passport::actingAs(
            User::factory()->create()
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

    //DESTROY
    public function test_destroy(): void
    {
        Passport::actingAs(
            User::factory()->create()
        );

        Pizza::create([
            'id' => 6969,
            'name' => 'Test Pizza',
            'amount' => 10,
            'price' => 1.99,
            'provider' => 1
        ]);

        $response = $this->delete('http://localhost:8000/api/pizzas/6969');

        $response->assertContent('{"message":"Pizza with id 6969 deleted successfully"}');
        $response->assertStatus(201);
    }

    //test respuestas fallos

    //STORE
    public function test_storeBadInput(): void
    {
        Passport::actingAs(
            User::factory()->create()
        );

        $response = $this->post('http://localhost:8000/api/pizzas', [
            'name' => 'Test Pizza',
            'amount' => "dsadas",
            'price' => 1.99,
            'provider' => 1
        ]);

        $response->assertStatus(400);
        $response->assertContent('{"message":"Error en los datos de entrada"}');
    }

    public function test_storeProviderNotFound(): void
    {
        Passport::actingAs(
            User::factory()->create()
        );

        $response = $this->post('http://localhost:8000/api/pizzas', [
            'name' => 'Test Pizza',
            'amount' => 10,
            'price' => 1.99,
            'provider' => 2555555
        ]);

        $response->assertStatus(400);
        $response->assertContent('{"message":"Provider with id 2555555 not found"}');
    }

    //UPDATE
    public function test_updateBadInput(): void
    {
        Passport::actingAs(
            User::factory()->create()
        );

        $response = $this->put('http://localhost:8000/api/pizzas', [
            'id' => 5,
            'name' => 'Pizza cinco quesos',
            'amount' => "pepe",
            'price' => 69.99,
            'provider' => 2
        ]);

        $response->assertStatus(400);
        $response->assertContent('{"message":"Error en los datos de entrada"}');
    }

    public function test_updateProviderNotFound(): void
    {
        Passport::actingAs(
            User::factory()->create()
        );

        $response = $this->put('http://localhost:8000/api/pizzas', [
            'id' => 5,
            'name' => 'Pizza cinco quesos',
            'amount' => 10,
            'price' => 69.99,
            'provider' => 2555555
        ]);

        $response->assertStatus(400);
        $response->assertContent('{"message":"Provider with id 2555555 not found"}');
    }

    //SHOW
    public function test_showIdNotFound(): void
    {
        Passport::actingAs(
            User::factory()->create()
        );

        $response = $this->get('http://localhost:8000/api/pizzas/2555555');

        $response->assertStatus(400);
        $response->assertContent('{"message":"Pizza with id 2555555 not found"}');
    }

    //SHOW PROVIDER
    public function test_showProviderPizzaNotFound(): void
    {
        Passport::actingAs(
            User::factory()->create()
        );

        Pizza::find(1)->update(['provider_id' => 25555]);

        $response = $this->get('http://localhost:8000/api/pizzas/provider/2555555');

        $response->assertStatus(400);
        $response->assertContent('{"message":"Pizza with id 2555555 not found"}');
    }

    //DESTROY
    public function test_destroyPizzaNotFound(): void
    {
        Passport::actingAs(
            User::factory()->create()
        );

        $response = $this->delete('http://localhost:8000/api/pizzas/6969');

        $response->assertContent('{"message":"Pizza with id 6969 not found"}');
        $response->assertStatus(400);
    }
}
