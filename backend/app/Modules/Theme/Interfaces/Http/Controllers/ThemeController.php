<?php

namespace App\Modules\Theme\Interfaces\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Theme\Application\DTOs\CreateThemeDTO;
use App\Modules\Theme\Application\DTOs\UpdateThemeDTO;
use App\Modules\Theme\Application\UseCases\CreateThemeUseCase;
use App\Modules\Theme\Application\UseCases\DeleteThemeUseCase;
use App\Modules\Theme\Application\UseCases\GetThemeUseCase;
use App\Modules\Theme\Application\UseCases\ListThemeUseCase;
use App\Modules\Theme\Application\UseCases\UpdateThemeUseCase;
use App\Modules\Theme\Infrastructure\Persistence\Models\ThemeModel;
use App\Modules\Theme\Interfaces\Http\Requests\StoreThemeRequest;
use App\Modules\Theme\Interfaces\Http\Requests\UpdateThemeRequest;
use App\Modules\Theme\Interfaces\Http\Resources\ThemeResource;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ThemeController extends Controller
{
    public function __construct(
        private ListThemeUseCase $listTheme,
        private GetThemeUseCase $getTheme,
        private CreateThemeUseCase $createTheme,
        private UpdateThemeUseCase $updateTheme,
        private DeleteThemeUseCase $deleteTheme,
    ) {}

    public function index(Request $request): JsonResponse
    {
        $themes = $this->listTheme->execute(
            $request->only([
                'theme_group_id',
                'code',
                'search',
                'sort_by',
                'sort_order',
                'per_page',
            ])
        );

        return response()->json([
            'message' => 'Lấy danh sách chủ đề thành công.',
            'data' => ThemeResource::collection(
                $themes->items()
            ),
            'meta' => [
                'current_page' => $themes->currentPage(),
                'per_page' => $themes->perPage(),
                'total' => $themes->total(),
                'last_page' => $themes->lastPage(),
                'from' => $themes->firstItem(),
                'to' => $themes->lastItem(),
            ],
        ]);
    }

    public function show(
        ThemeModel $theme
    ): JsonResponse {
        $theme = $this->getTheme->execute(
            $theme->id
        );

        if (!$theme) {
            return response()->json([
                'message' => 'Không tìm thấy chủ đề.',
            ], 404);
        }

        return response()->json([
            'message' => 'Lấy thông tin chủ đề thành công.',
            'data' => new ThemeResource($theme),
        ]);
    }

    public function store(
        StoreThemeRequest $request
    ): JsonResponse {
        $theme = $this->createTheme->execute(
            new CreateThemeDTO(
                $request->validated()
            )
        );

        return response()->json([
            'message' => 'Tạo chủ đề thành công.',
            'data' => new ThemeResource($theme),
        ], 201);
    }

    public function update(
        UpdateThemeRequest $request,
        ThemeModel $theme
    ): JsonResponse {
        $theme = $this->updateTheme->execute(
            new UpdateThemeDTO(
                $theme,
                $request->validated()
            )
        );

        return response()->json([
            'message' => 'Cập nhật chủ đề thành công.',
            'data' => new ThemeResource($theme),
        ]);
    }

    public function destroy(
        ThemeModel $theme
    ): JsonResponse {
        if ($theme->products()->exists()) {
            return response()->json([
                'message' => 'Không thể xóa chủ đề đang được sử dụng bởi sản phẩm.',
            ], 409);
        }

        $this->deleteTheme->execute($theme);

        return response()->json([
            'message' => 'Xóa chủ đề thành công.',
        ]);
    }
}
