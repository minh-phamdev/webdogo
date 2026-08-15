<?php

namespace App\Modules\StatueTheme\Interfaces\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\StatueTheme\Domain\Repositories\StatueThemeRepositoryInterface;
use App\Modules\StatueTheme\Interfaces\Http\Requests\StoreStatueThemeRequest;
use App\Modules\StatueTheme\Interfaces\Http\Requests\UpdateStatueThemeRequest;
use App\Modules\StatueTheme\Interfaces\Http\Resources\StatueThemeResource;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class StatueThemeController extends Controller
{
    public function __construct(
        private readonly StatueThemeRepositoryInterface $repository
    ) {
    }

    public function index(Request $request)
    {
        $themes = $this->repository->getAll(
            $request->only([
                'theme_group_id',
                'code',
                'search',
                'sort_by',
                'sort_order',
                'per_page',
            ])
        );

        return StatueThemeResource::collection($themes);
    }

    public function show(int $statueTheme): JsonResponse
    {
        $theme = $this->repository->find($statueTheme);

        if (!$theme) {
            return response()->json([
                'message' => 'Không tìm thấy chủ đề tượng.',
            ], 404);
        }

        return response()->json([
            'message' => 'Lấy thông tin chủ đề tượng thành công.',
            'data' => new StatueThemeResource($theme),
        ]);
    }

    public function store(
        StoreStatueThemeRequest $request
    ): JsonResponse {
        $theme = $this->repository->create(
            $request->validated()
        );

        return response()->json([
            'message' => 'Tạo chủ đề tượng thành công.',
            'data' => new StatueThemeResource($theme),
        ], 201);
    }

    public function update(
        UpdateStatueThemeRequest $request,
        int $statueTheme
    ): JsonResponse {
        $theme = $this->repository->find($statueTheme);

        if (!$theme) {
            return response()->json([
                'message' => 'Không tìm thấy chủ đề tượng.',
            ], 404);
        }

        $theme = $this->repository->update(
            $theme,
            $request->validated()
        );

        return response()->json([
            'message' => 'Cập nhật chủ đề tượng thành công.',
            'data' => new StatueThemeResource($theme),
        ]);
    }

    public function destroy(int $statueTheme): JsonResponse
    {
        $theme = $this->repository->find($statueTheme);

        if (!$theme) {
            return response()->json([
                'message' => 'Không tìm thấy chủ đề tượng.',
            ], 404);
        }

        $this->repository->delete($theme);

        return response()->json([
            'message' => 'Xóa chủ đề tượng thành công.',
        ]);
    }
}
