<?php

namespace App\Http\Controllers\API;

use App\BO\CategoryBO;
use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Repositories\Interfaces\CategoryRepositoryInterface;
use Illuminate\Http\JsonResponse;

class CategoryController extends Controller
{
    private CategoryRepositoryInterface $categoryRepository;

    public function __construct(CategoryRepositoryInterface $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    public function index(): JsonResponse
    {
        return response()->json($this->categoryRepository->getAll());
    }

    public function show(int $id): JsonResponse
    {
        $category = $this->categoryRepository->getById($id);
        return $category ? response()->json($category) : response()->json(['error' => 'Category not found'], 404);
    }

    public function store(CategoryRequest $request): JsonResponse
    {
        $categoryBO = new CategoryBO($request->validated());
        $newCategory = $this->categoryRepository->create($categoryBO);

        return response()->json($newCategory, 201);
    }

    public function update(CategoryRequest $request, int $id): JsonResponse
    {
        $categoryBO = new CategoryBO($request->validated());
        $updatedCategory = $this->categoryRepository->update($id, $categoryBO);

        return $updatedCategory ? response()->json($updatedCategory) : response()->json(['error' => 'Category not found'], 404);
    }

    public function destroy(int $id): JsonResponse
    {
        return $this->categoryRepository->delete($id)
            ? response()->json(['message' => 'Category deleted successfully'])
            : response()->json(['error' => 'Category not found'], 404);
    }
}
