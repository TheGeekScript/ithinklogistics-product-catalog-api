<?php

namespace Tests\Feature;

use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProductApiTest extends TestCase
{
    use RefreshDatabase;

    public function test_it_can_list_products()
    {
        Product::factory()->count(3)->create();

        $response = $this->getJson('/api/v1/products');

        $response->assertStatus(200)
                 ->assertJsonCount(3, 'data');
    }

    public function test_it_can_create_a_product()
    {
        $productData = Product::factory()->make()->toArray();

        $response = $this->postJson('/api/v1/products', $productData);

        $response->assertStatus(201)
                 ->assertJson(['name' => $productData['name']]);
    }

    public function test_it_can_show_a_product()
    {
        $product = Product::factory()->create();

        $response = $this->getJson("/api/v1/products/{$product->id}");

        $response->assertStatus(200)
                 ->assertJson(['id' => $product->id]);
    }

    public function test_it_can_delete_a_product()
    {
        $product = Product::factory()->create();

        $response = $this->deleteJson("/api/v1/products/{$product->id}");

        $response->assertStatus(204);
        $this->assertDatabaseMissing('products', ['id' => $product->id]);
    }
}