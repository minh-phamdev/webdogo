<?php

namespace App\Modules\ProductStatus\Interfaces\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\ProductStatus\Domain\Repositories\ProductStatusRepositoryInterface;
use App\Modules\ProductStatus\Interfaces\Http\Requests\StoreProductStatusRequest;
use App\Modules\ProductStatus\Interfaces\Http\Requests\UpdateProductStatusRequest;
use App\Modules\ProductStatus\Interfaces\Http\Resources\ProductStatusResource;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ProductStatusController extends Controller
{
    public function __construct(
        private readonly ProductStatusRepositoryInterface $repository
    ) {
    }

    public function index(Request $request)
    {
        $statuses = $this->repository->getAll(
            $request->only([
                'search',
                'code',
                'sort_by',
                'sort_order',
                'per_page',
            ])
        );

        return ProductStatusResource::collection($statuses);
    }

    public function show(int $productStatus): JsonResponse
    {
        $status = $this->repository->find($productStatus);

        if (!$status) {
            return response()->json([
                'message' => 'Không tìm thấy trạng thái sản phẩm.',
            ], 404);
        }

        return response()->json([
            'message' => 'Lấy trạng thái sản phẩm thành công.',
            'data' => new ProductStatusResource($status),
        ]);
    }

    public function store(
        StoreProductStatusRequest $request
    ): JsonResponse {
        $status = $this->repository->create(
            $request->validated()
        );

        return response()->json([
            'message' => 'Tạo trạng thái sản phẩm thành công.',
            'data' => new ProductStatusResource($status),
        ], 201);
    }

    public function update(
        UpdateProductStatusRequest $request,
        int $productStatus
    ): JsonResponse {
        $status = $this->repository->find($productStatus);

        if (!$status) {
            return response()->json([
                'message' => 'Không tìm thấy trạng thái sản phẩm.',
            ], 404);
        }

        $status = $this->repository->update(
            $status,
            $request->validated()
        );

        return response()->json([
            'message' => 'Cập nhật trạng thái sản phẩm thành công.',
            'data' => new ProductStatusResource($status),
        ]);
    }

    public function destroy(int $productStatus): JsonResponse
    {
        $status = $this->repository->find($productStatus);

        if (!$status) {
            return response()->json([
                'message' => 'Không tìm thấy trạng thái sản phẩm.',
            ], 404);
        }

        $this->repository->delete($status);

        return response()->json([
            'message' => 'Xóa trạng thái sản phẩm thành công.',
        ]);
    }
}
