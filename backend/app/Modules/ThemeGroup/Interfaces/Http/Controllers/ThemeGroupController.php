<?php

namespace App\Modules\ThemeGroup\Interfaces\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\ThemeGroup\Application\DTOs\CreateThemeGroupDTO;
use App\Modules\ThemeGroup\Application\DTOs\UpdateThemeGroupDTO;
use App\Modules\ThemeGroup\Application\UseCases\CreateThemeGroupUseCase;
use App\Modules\ThemeGroup\Application\UseCases\DeleteThemeGroupUseCase;
use App\Modules\ThemeGroup\Application\UseCases\GetThemeGroupUseCase;
use App\Modules\ThemeGroup\Application\UseCases\ListThemeGroupUseCase;
use App\Modules\ThemeGroup\Application\UseCases\UpdateThemeGroupUseCase;
use App\Modules\ThemeGroup\Infrastructure\Persistence\Models\ThemeGroupModel;
use App\Modules\ThemeGroup\Interfaces\Http\Requests\StoreThemeGroupRequest;
use App\Modules\ThemeGroup\Interfaces\Http\Requests\UpdateThemeGroupRequest;
use App\Modules\ThemeGroup\Interfaces\Http\Resources\ThemeGroupResource;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ThemeGroupController extends Controller
{
    public function index(
        Request $request,
        ListThemeGroupUseCase $useCase
    ): JsonResponse {
        $themeGroups = $useCase->execute(
            $request->only([
                'search',
                'code',
                'sort_by',
                'sort_order',
                'per_page',
            ])
        );

        return response()->json([
            'message' => 'Lấy danh sách nhóm chủ đề thành công.',
            'data' => ThemeGroupResource::collection(
                $themeGroups->items()
            ),
            'meta' => [
                'current_page' => $themeGroups->currentPage(),
                'per_page' => $themeGroups->perPage(),
                'total' => $themeGroups->total(),
                'last_page' => $themeGroups->lastPage(),
                'from' => $themeGroups->firstItem(),
                'to' => $themeGroups->lastItem(),
            ],
        ]);
    }

    public function show(
        ThemeGroupModel $themeGroup,
        GetThemeGroupUseCase $useCase
    ): JsonResponse {
        $themeGroup = $useCase->execute(
            $themeGroup->id
        );

        return response()->json([
            'message' => 'Lấy thông tin nhóm chủ đề thành công.',
            'data' => new ThemeGroupResource($themeGroup),
        ]);
    }

    public function store(
        StoreThemeGroupRequest $request,
        CreateThemeGroupUseCase $useCase
    ): JsonResponse {
        $themeGroup = $useCase->execute(
            new CreateThemeGroupDTO(
                $request->validated()
            )
        );

        return response()->json([
            'message' => 'Tạo nhóm chủ đề thành công.',
            'data' => new ThemeGroupResource($themeGroup),
        ], 201);
    }

    public function update(
        UpdateThemeGroupRequest $request,
        ThemeGroupModel $themeGroup,
        UpdateThemeGroupUseCase $useCase
    ): JsonResponse {
        $themeGroup = $useCase->execute(
            new UpdateThemeGroupDTO(
                $themeGroup,
                $request->validated()
            )
        );

        return response()->json([
            'message' => 'Cập nhật nhóm chủ đề thành công.',
            'data' => new ThemeGroupResource($themeGroup),
        ]);
    }

    public function destroy(
        ThemeGroupModel $themeGroup,
        DeleteThemeGroupUseCase $useCase
    ): JsonResponse {
        if ($themeGroup->themes()->exists()) {
            return response()->json([
                'message' => 'Không thể xóa nhóm chủ đề đang được sử dụng.',
            ], 409);
        }

        $useCase->execute($themeGroup);

        return response()->json([
            'message' => 'Xóa nhóm chủ đề thành công.',
        ]);
    }
}
