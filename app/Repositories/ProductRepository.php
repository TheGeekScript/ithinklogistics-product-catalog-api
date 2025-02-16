<?php 

namespace App\Repositories;

use App\BO\ProductBO;
use App\Models\Product;
use App\Repositories\Interfaces\ProductRepositoryInterface;
use Illuminate\Support\Collection;

class ProductRepository implements ProductRepositoryInterface
{
    public function getAll(int $perPage, ?int $categoryId): Collection
    {
        $query = Product::query();

        if ($categoryId) {
            $query->where('category_id', $categoryId);
        }

        return $query->paginate($perPage)->map(fn($product) => new ProductBO($product->toArray()));
    }

    public function getById(int $id): ?ProductBO
    {
        $product = Product::find($id);
        return $product ? new ProductBO($product->toArray()) : null;
    }

    public function create(ProductBO $productBO): ProductBO
    {
        $product = Product::create((array) $productBO);
        return new ProductBO($product->toArray());
    }

    public function update(int $id, ProductBO $productBO): ?ProductBO
    {
        $product = Product::find($id);
        if (!$product) {
            return null;
        }
        $product->update((array) $productBO);
        return new ProductBO($product->toArray());
    }

    public function delete(int $id): bool
    {
        return Product::destroy($id) > 0;
    }
}