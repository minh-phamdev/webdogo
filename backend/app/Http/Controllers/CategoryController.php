<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Models\Category;
use App\Services\CategoryService;
use Illuminate\Http\JsonResponse;

class CategoryController extends Controller
{
    public function __construct(
        private readonly CategoryService $categoryService
    ) {
    }

    public function index(): JsonResponse
    {
        return response()->json([
            'message' => 'Lấy danh sách danh mục thành công.',
            'data' => $this->categoryService->getAll(),
        ]);
    }

    public function show(Category $category): JsonResponse
    {
        return response()->json([
            'message' => 'Lấy thông tin danh mục thành công.',
            'data' => $this->categoryService->getById($category->id),
        ]);
    }

    public function store(StoreCategoryRequest $request): JsonResponse
    {
        $category = $this->categoryService->create(
            $request->validated()
        );

        return response()->json([
            'message' => 'Tạo danh mục thành công.',
            'data' => $category,
        ], 201);
    }

    public function update(
        UpdateCategoryRequest $request,
        Category $category
    ): JsonResponse {
        $category = $this->categoryService->update(
            $category,
            $request->validated()
        );

        return response()->json([
            'message' => 'Cập nhật danh mục thành công.',
            'data' => $category,
        ]);
    }

    public function destroy(Category $category): JsonResponse
    {
        $this->categoryService->delete($category);

        return response()->json([
            'message' => 'Xóa danh mục thành công.',
        ]);
    }
}
