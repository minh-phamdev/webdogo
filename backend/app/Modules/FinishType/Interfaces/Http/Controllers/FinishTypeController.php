<?php

namespace App\Modules\FinishType\Interfaces\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\FinishType\Domain\Repositories\FinishTypeRepositoryInterface;
use App\Modules\FinishType\Interfaces\Http\Requests\StoreFinishTypeRequest;
use App\Modules\FinishType\Interfaces\Http\Requests\UpdateFinishTypeRequest;
use App\Modules\FinishType\Interfaces\Http\Resources\FinishTypeResource;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class FinishTypeController extends Controller
{
    public function __construct(
        private readonly FinishTypeRepositoryInterface $repository
    ) {
    }

    public function index(Request $request)
    {
        $finishTypes = $this->repository->getAll(
            $request->only([
                'code',
                'search',
                'sort_by',
                'sort_order',
                'per_page',
            ])
        );

        return FinishTypeResource::collection($finishTypes);
    }

    public function show(int $finishType): JsonResponse
    {
        $type = $this->repository->find($finishType);

        if (!$type) {
            return response()->json([
                'message' => 'Không tìm thấy loại hoàn thiện.',
            ], 404);
        }

        return response()->json([
            'message' => 'Lấy thông tin loại hoàn thiện thành công.',
            'data' => new FinishTypeResource($type),
        ]);
    }

    public function store(
        StoreFinishTypeRequest $request
    ): JsonResponse {
        $type = $this->repository->create(
            $request->validated()
        );

        return response()->json([
            'message' => 'Tạo loại hoàn thiện thành công.',
            'data' => new FinishTypeResource($type),
        ], 201);
    }

    public function update(
        UpdateFinishTypeRequest $request,
        int $finishType
    ): JsonResponse {
        $type = $this->repository->find($finishType);

        if (!$type) {
            return response()->json([
                'message' => 'Không tìm thấy loại hoàn thiện.',
            ], 404);
        }

        $type = $this->repository->update(
            $type,
            $request->validated()
        );

        return response()->json([
            'message' => 'Cập nhật loại hoàn thiện thành công.',
            'data' => new FinishTypeResource($type),
        ]);
    }

    public function destroy(int $finishType): JsonResponse
    {
        $type = $this->repository->find($finishType);

        if (!$type) {
            return response()->json([
                'message' => 'Không tìm thấy loại hoàn thiện.',
            ], 404);
        }

        $this->repository->delete($type);

        return response()->json([
            'message' => 'Xóa loại hoàn thiện thành công.',
        ]);
    }
}
