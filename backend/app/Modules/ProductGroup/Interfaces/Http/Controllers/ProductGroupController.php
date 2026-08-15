<?php

namespace App\Modules\ProductGroup\Interfaces\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\ProductGroup\Application\DTOs\CreateProductGroupDTO;
use App\Modules\ProductGroup\Application\DTOs\UpdateProductGroupDTO;
use App\Modules\ProductGroup\Application\UseCases\CreateProductGroupUseCase;
use App\Modules\ProductGroup\Application\UseCases\DeleteProductGroupUseCase;
use App\Modules\ProductGroup\Application\UseCases\GetProductGroupUseCase;
use App\Modules\ProductGroup\Application\UseCases\ListProductGroupUseCase;
use App\Modules\ProductGroup\Application\UseCases\UpdateProductGroupUseCase;
use App\Modules\ProductGroup\Infrastructure\Persistence\Models\ProductGroupModel;
use App\Modules\ProductGroup\Interfaces\Http\Requests\StoreProductGroupRequest;
use App\Modules\ProductGroup\Interfaces\Http\Requests\UpdateProductGroupRequest;
use App\Modules\ProductGroup\Interfaces\Http\Resources\ProductGroupResource;
use Illuminate\Http\JsonResponse;

class ProductGroupController extends Controller
{
    public function __construct(
        private ListProductGroupUseCase $listUseCase,
        private GetProductGroupUseCase $getUseCase,
        private CreateProductGroupUseCase $createUseCase,
        private UpdateProductGroupUseCase $updateUseCase,
        private DeleteProductGroupUseCase $deleteUseCase
    ) {
    }

    /**
     * GET /api/product-groups
     */
    public function index(): JsonResponse
    {
        $groups = $this->listUseCase->execute();

        return response()->json([
            'message' => 'Lấy danh sách nhóm sản phẩm thành công.',
            'data' => ProductGroupResource::collection($groups),
        ]);
    }

    /**
     * GET /api/product-groups/{productGroup}
     */
    public function show(int $productGroup): JsonResponse
    {
        $group = $this->getUseCase->execute($productGroup);

        if ($group === null) {
            return response()->json([
                'message' => 'Không tìm thấy nhóm sản phẩm.',
            ], 404);
        }

        return response()->json([
            'message' => 'Lấy thông tin nhóm sản phẩm thành công.',
            'data' => new ProductGroupResource($group),
        ]);
    }

    /**
     * POST /api/product-groups
     */
    public function store(
        StoreProductGroupRequest $request
    ): JsonResponse {
        $group = $this->createUseCase->execute(
            new CreateProductGroupDTO(
                $request->validated()
            )
        );

        return response()->json([
            'message' => 'Tạo nhóm sản phẩm thành công.',
            'data' => new ProductGroupResource($group),
        ], 201);
    }

    /**
     * PUT /api/product-groups/{productGroup}
     */
    public function update(
        UpdateProductGroupRequest $request,
        ProductGroupModel $productGroup
    ): JsonResponse {
        $group = $this->updateUseCase->execute(
            new UpdateProductGroupDTO(
                $productGroup,
                $request->validated()
            )
        );

        return response()->json([
            'message' => 'Cập nhật nhóm sản phẩm thành công.',
            'data' => new ProductGroupResource($group),
        ]);
    }

    /**
     * DELETE /api/product-groups/{productGroup}
     */
    public function destroy(
        ProductGroupModel $productGroup
    ): JsonResponse {
        $this->deleteUseCase->execute($productGroup);

        return response()->json([
            'message' => 'Xóa nhóm sản phẩm thành công.',
        ]);
    }
}
