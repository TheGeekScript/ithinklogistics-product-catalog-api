<?php

namespace Tests\Feature;

use App\Models\Product;
use App\Repositories\ProductRepository;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\BO\ProductBO;

class ProductRepositoryTest extends TestCase
{
    use RefreshDatabase;

    protected ProductRepository $productRepo;

    protected function setUp(): void
    {
        parent::setUp();
        $this->productRepo = app(ProductRepository::class);
    }

    public function test_it_can_create_a_product()
    {
        $productData = Product::factory()->make()->toArray();
        $productBO = new ProductBO($productData);
    
        $product = $this->productRepo->create($productBO);

        $this->assertDatabaseHas('products', ['id' => $product->id]);
    }

    public function test_it_can_fetch_all_products()
    {
        Product::factory()->count(5)->create();
        $products = $this->productRepo->getAll(10, null);
        $this->assertCount(5, $products);
    }

    public function test_it_can_find_a_product_by_id()
    {
        $product = Product::factory()->create();
        $foundProduct = $this->productRepo->getById($product->id);

        $this->assertNotNull($foundProduct);
        $this->assertEquals($product->id, $foundProduct->id);
    }
}

