<?php

namespace App\Http\Controllers\API;

use App\BO\ProductBO;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Repositories\Interfaces\ProductRepositoryInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    private ProductRepositoryInterface $productRepository;

    public function __construct(ProductRepositoryInterface $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function index(Request $request): JsonResponse
    {
        $perPage = $request->query('per_page', 10);
        $categoryId = $request->query('category_id');

        $products = $this->productRepository->getAll($perPage, $categoryId);

        return response()->json([
            'data' => $products
        ], 200);
    }

    public function show(int $id): JsonResponse
    {
        $product = $this->productRepository->getById($id);
        return $product ? response()->json($product) : response()->json(['error' => 'Product not found'], 404);
    }

    public function store(ProductRequest $request): JsonResponse
    {
        $productBO = new ProductBO($request->validated());
        $newProduct = $this->productRepository->create($productBO);

        return response()->json($newProduct, 201);
    }

    public function update(ProductRequest $request, int $id): JsonResponse
    {
        $productBO = new ProductBO($request->validated());
        $updatedProduct = $this->productRepository->update($id, $productBO);

        return $updatedProduct ? response()->json($updatedProduct) : response()->json(['error' => 'Product not found'], 404);
    }

    public function destroy(int $id): JsonResponse
    {
        return $this->productRepository->delete($id)
            ? response()->json(['message' => 'Product deleted successfully'], 204)
            : response()->json(['error' => 'Product not found'], 404);
    }
}

