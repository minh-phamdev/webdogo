<?php

namespace App\Modules\Category\Interfaces\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Category\Application\DTOs\CreateCategoryDTO;
use App\Modules\Category\Application\DTOs\UpdateCategoryDTO;
use App\Modules\Category\Application\UseCases\CreateCategoryUseCase;
use App\Modules\Category\Application\UseCases\DeleteCategoryUseCase;
use App\Modules\Category\Application\UseCases\GetCategoryUseCase;
use App\Modules\Category\Application\UseCases\ListCategoryUseCase;
use App\Modules\Category\Application\UseCases\UpdateCategoryUseCase;
use App\Modules\Category\Interfaces\Http\Requests\StoreCategoryRequest;
use App\Modules\Category\Interfaces\Http\Requests\UpdateCategoryRequest;
use App\Modules\Category\Interfaces\Http\Resources\CategoryResource;
use Illuminate\Http\JsonResponse;

class CategoryController extends Controller
{
    public function __construct(
        private readonly ListCategoryUseCase $listCategoryUseCase,
        private readonly GetCategoryUseCase $getCategoryUseCase,
        private readonly CreateCategoryUseCase $createCategoryUseCase,
        private readonly UpdateCategoryUseCase $updateCategoryUseCase,
        private readonly DeleteCategoryUseCase $deleteCategoryUseCase,
    ) {}

    public function index(): JsonResponse
    {
        $categories = $this->listCategoryUseCase->execute();

        return response()->json([
            'message' => 'Lấy danh sách danh mục thành công.',
            'data' => CategoryResource::collection($categories),
        ]);
    }

    public function show(int $category): JsonResponse
    {
        $categoryModel = $this->getCategoryUseCase->execute($category);

        if (!$categoryModel) {
            return response()->json([
                'message' => 'Không tìm thấy danh mục.',
            ], 404);
        }

        return response()->json([
            'message' => 'Lấy thông tin danh mục thành công.',
            'data' => new CategoryResource($categoryModel),
        ]);
    }

    public function store(
        StoreCategoryRequest $request
    ): JsonResponse {
        $category = $this->createCategoryUseCase->execute(
            new CreateCategoryDTO(
                $request->validated()
            )
        );

        return response()->json([
            'message' => 'Tạo danh mục thành công.',
            'data' => new CategoryResource($category),
        ], 201);
    }

    public function update(
        UpdateCategoryRequest $request,
        int $category
    ): JsonResponse {
        $categoryModel = $this->getCategoryUseCase->execute($category);

        if (!$categoryModel) {
            return response()->json([
                'message' => 'Không tìm thấy danh mục.',
            ], 404);
        }

        $categoryModel = $this->updateCategoryUseCase->execute(
            new UpdateCategoryDTO(
                $categoryModel,
                $request->validated()
            )
        );

        return response()->json([
            'message' => 'Cập nhật danh mục thành công.',
            'data' => new CategoryResource($categoryModel),
        ]);
    }

    public function destroy(int $category): JsonResponse
    {
        $categoryModel = $this->getCategoryUseCase->execute($category);

        if (!$categoryModel) {
            return response()->json([
                'message' => 'Không tìm thấy danh mục.',
            ], 404);
        }

        $this->deleteCategoryUseCase->execute($categoryModel);

        return response()->json([
            'message' => 'Xóa danh mục thành công.',
        ]);
    }
}
