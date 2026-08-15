<?php

namespace App\Modules\WoodType\Interfaces\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\WoodType\Domain\Repositories\WoodTypeRepositoryInterface;
use App\Modules\WoodType\Interfaces\Http\Requests\StoreWoodTypeRequest;
use App\Modules\WoodType\Interfaces\Http\Requests\UpdateWoodTypeRequest;
use App\Modules\WoodType\Interfaces\Http\Resources\WoodTypeResource;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class WoodTypeController extends Controller
{
    public function __construct(
        private readonly WoodTypeRepositoryInterface $repository
    ) {
    }

    public function index(Request $request)
    {
        $woodTypes = $this->repository->getAll(
            $request->only([
                'search',
                'code',
                'group_no',
                'is_precious',
                'is_restricted',
                'sort_by',
                'sort_order',
                'per_page',
            ])
        );

        return WoodTypeResource::collection($woodTypes);
    }

    public function show(int $woodType): JsonResponse
    {
        $woodTypeModel = $this->repository->find($woodType);

        if (!$woodTypeModel) {
            return response()->json([
                'message' => 'Không tìm thấy loại gỗ.',
            ], 404);
        }

        return response()->json([
            'message' => 'Lấy thông tin loại gỗ thành công.',
            'data' => new WoodTypeResource($woodTypeModel),
        ]);
    }

    public function store(
        StoreWoodTypeRequest $request
    ): JsonResponse {
        $woodType = $this->repository->create(
            $request->validated()
        );

        return response()->json([
            'message' => 'Tạo loại gỗ thành công.',
            'data' => new WoodTypeResource($woodType),
        ], 201);
    }

    public function update(
        UpdateWoodTypeRequest $request,
        int $woodType
    ): JsonResponse {
        $woodTypeModel = $this->repository->find($woodType);

        if (!$woodTypeModel) {
            return response()->json([
                'message' => 'Không tìm thấy loại gỗ.',
            ], 404);
        }

        $woodTypeModel = $this->repository->update(
            $woodTypeModel,
            $request->validated()
        );

        return response()->json([
            'message' => 'Cập nhật loại gỗ thành công.',
            'data' => new WoodTypeResource($woodTypeModel),
        ]);
    }

    public function destroy(int $woodType): JsonResponse
    {
        $woodTypeModel = $this->repository->find($woodType);

        if (!$woodTypeModel) {
            return response()->json([
                'message' => 'Không tìm thấy loại gỗ.',
            ], 404);
        }

        $this->repository->delete($woodTypeModel);

        return response()->json([
            'message' => 'Xóa loại gỗ thành công.',
        ]);
    }
}
