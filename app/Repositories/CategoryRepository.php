<?php 

namespace App\Repositories;

use App\BO\CategoryBO;
use App\Models\Category;
use App\Repositories\Interfaces\CategoryRepositoryInterface;
use Illuminate\Support\Collection;

class CategoryRepository implements CategoryRepositoryInterface
{
    public function getAll(): Collection
    {
        return Category::with('children')->get()->map(fn($category) => new CategoryBO($category->toArray()));
    }

    public function getById(int $id): ?CategoryBO
    {
        $category = Category::find($id);
        return $category ? new CategoryBO($category->toArray()) : null;
    }

    public function create(CategoryBO $categoryBO): CategoryBO
    {
        $category = Category::create((array) $categoryBO);
        return new CategoryBO($category->toArray());
    }

    public function update(int $id, CategoryBO $categoryBO): ?CategoryBO
    {
        $category = Category::find($id);
        if (!$category) {
            return null;
        }
        $category->update((array) $categoryBO);
        return new CategoryBO($category->toArray());
    }

    public function delete(int $id): bool
    {
        return Category::destroy($id) > 0;
    }
}
