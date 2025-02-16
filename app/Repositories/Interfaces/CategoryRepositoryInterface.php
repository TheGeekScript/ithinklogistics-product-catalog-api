<?php 

namespace App\Repositories\Interfaces;

use App\BO\CategoryBO;
use Illuminate\Support\Collection;

interface CategoryRepositoryInterface
{
    public function getAll(): Collection;
    public function getById(int $id): ?CategoryBO;
    public function create(CategoryBO $categoryBO): CategoryBO;
    public function update(int $id, CategoryBO $categoryBO): ?CategoryBO;
    public function delete(int $id): bool;
}
