<?php

namespace App\Modules\Artisan\Interfaces\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Artisan\Application\DTOs\CreateArtisanDTO;
use App\Modules\Artisan\Application\DTOs\UpdateArtisanDTO;
use App\Modules\Artisan\Application\UseCases\CreateArtisanUseCase;
use App\Modules\Artisan\Application\UseCases\DeleteArtisanUseCase;
use App\Modules\Artisan\Application\UseCases\GetArtisanUseCase;
use App\Modules\Artisan\Application\UseCases\ListArtisansUseCase;
use App\Modules\Artisan\Application\UseCases\UpdateArtisanUseCase;
use App\Modules\Artisan\Infrastructure\Persistence\Models\ArtisanModel;
use App\Modules\Artisan\Interfaces\Http\Requests\StoreArtisanRequest;
use App\Modules\Artisan\Interfaces\Http\Requests\UpdateArtisanRequest;
use App\Modules\Artisan\Interfaces\Http\Resources\ArtisanResource;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ArtisanController extends Controller
{
    public function __construct(
        private readonly ListArtisansUseCase $listArtisansUseCase,
        private readonly GetArtisanUseCase $getArtisanUseCase,
        private readonly CreateArtisanUseCase $createArtisanUseCase,
        private readonly UpdateArtisanUseCase $updateArtisanUseCase,
        private readonly DeleteArtisanUseCase $deleteArtisanUseCase,
    ) {}

    /**
     * GET /api/artisans
     */
    public function index(
        Request $request
    ): JsonResponse {
        $artisans = $this->listArtisansUseCase->execute(
            $request->query()
        );

        return response()->json([
            'message' => 'Lấy danh sách nghệ nhân thành công.',
            'data' => ArtisanResource::collection(
                $artisans->items()
            ),
            'meta' => [
                'current_page' => $artisans->currentPage(),
                'per_page' => $artisans->perPage(),
                'total' => $artisans->total(),
                'last_page' => $artisans->lastPage(),
                'from' => $artisans->firstItem(),
                'to' => $artisans->lastItem(),
            ],
        ]);
    }

    /**
     * GET /api/artisans/{artisan}
     */
    public function show(
        ArtisanModel $artisan
    ): JsonResponse {
        return response()->json([
            'message' => 'Lấy thông tin nghệ nhân thành công.',
            'data' => new ArtisanResource($artisan),
        ]);
    }

    /**
     * POST /api/artisans
     */
    public function store(
        StoreArtisanRequest $request
    ): JsonResponse {
        $artisan = $this->createArtisanUseCase->execute(
            new CreateArtisanDTO(
                $request->validated()
            )
        );

        return response()->json([
            'message' => 'Tạo nghệ nhân thành công.',
            'data' => new ArtisanResource($artisan),
        ], 201);
    }

    /**
     * PUT /api/artisans/{artisan}
     */
    public function update(
        UpdateArtisanRequest $request,
        ArtisanModel $artisan
    ): JsonResponse {
        $artisan = $this->updateArtisanUseCase->execute(
            new UpdateArtisanDTO(
                $artisan,
                $request->validated()
            )
        );

        return response()->json([
            'message' => 'Cập nhật nghệ nhân thành công.',
            'data' => new ArtisanResource($artisan),
        ]);
    }

    /**
     * DELETE /api/artisans/{artisan}
     */
    public function destroy(
        ArtisanModel $artisan
    ): JsonResponse {
        $this->deleteArtisanUseCase->execute(
            $artisan
        );

        return response()->json([
            'message' => 'Xóa nghệ nhân thành công.',
        ]);
    }
}
