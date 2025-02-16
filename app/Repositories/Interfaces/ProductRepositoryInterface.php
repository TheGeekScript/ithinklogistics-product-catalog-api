<?php 

namespace App\Repositories\Interfaces;

use App\BO\ProductBO;
use Illuminate\Support\Collection;

interface ProductRepositoryInterface
{
    public function getAll(int $perPage, ?int $categoryId): Collection;
    public function getById(int $id): ?ProductBO;
    public function create(ProductBO $productBO): ProductBO;
    public function update(int $id, ProductBO $productBO): ?ProductBO;
    public function delete(int $id): bool;
}
