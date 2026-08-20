<?php

namespace App\Modules\Product\Interfaces\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Product\Application\DTOs\CreateProductMediaDTO;
use App\Modules\Product\Application\DTOs\UpdateProductMediaDTO;
use App\Modules\Product\Application\UseCases\CreateProductMediaUseCase;
use App\Modules\Product\Application\UseCases\DeleteProductMediaUseCase;
use App\Modules\Product\Application\UseCases\GetProductMediaUseCase;
use App\Modules\Product\Application\UseCases\GetProductUseCase;
use App\Modules\Product\Application\UseCases\ListProductMediaUseCase;
use App\Modules\Product\Application\UseCases\UpdateProductMediaUseCase;
use App\Modules\Product\Interfaces\Http\Requests\StoreProductMediaRequest;
use App\Modules\Product\Interfaces\Http\Requests\UpdateProductMediaRequest;
use App\Modules\Product\Interfaces\Http\Resources\ProductMediaResource;
use Illuminate\Http\JsonResponse;

class ProductMediaController extends Controller
{
    public function __construct(
        private ListProductMediaUseCase $listMedia,
        private GetProductMediaUseCase $getMedia,
        private CreateProductMediaUseCase $createMedia,
        private UpdateProductMediaUseCase $updateMedia,
        private DeleteProductMediaUseCase $deleteMedia,
        private GetProductUseCase $getProduct,
    ) {}

    public function index(
        int $product
    ): JsonResponse {
        $productModel = $this->getProduct->execute($product);

        if (!$productModel) {
            return response()->json([
                'message' => 'Không tìm thấy sản phẩm.',
            ], 404);
        }

        $media = $this->listMedia->execute($product);

        return response()->json([
            'message' => 'Lấy danh sách media thành công.',
            'data' => ProductMediaResource::collection($media),
        ]);
    }

    public function store(
        StoreProductMediaRequest $request,
        int $product
    ): JsonResponse {
        $productModel = $this->getProduct->execute($product);

        if (!$productModel) {
            return response()->json([
                'message' => 'Không tìm thấy sản phẩm.',
            ], 404);
        }

        $data = $request->validated();

        $data['product_id'] = $product;

        $media = $this->createMedia->execute(
            new CreateProductMediaDTO($data)
        );

        return response()->json([
            'message' => 'Thêm media thành công.',
            'data' => new ProductMediaResource($media),
        ], 201);
    }

    public function update(
        UpdateProductMediaRequest $request,
        int $product,
        int $media
    ): JsonResponse {
        $productModel = $this->getProduct->execute($product);

        if (!$productModel) {
            return response()->json([
                'message' => 'Không tìm thấy sản phẩm.',
            ], 404);
        }

        $mediaModel = $this->getMedia->execute($media);

        if (
            !$mediaModel
            || $mediaModel->product_id !== $product
        ) {
            return response()->json([
                'message' => 'Không tìm thấy media thuộc sản phẩm này.',
            ], 404);
        }

        $mediaModel = $this->updateMedia->execute(
            new UpdateProductMediaDTO(
                $mediaModel,
                $request->validated()
            )
        );

        return response()->json([
            'message' => 'Cập nhật media thành công.',
            'data' => new ProductMediaResource($mediaModel),
        ]);
    }

    public function destroy(
        int $product,
        int $media
    ): JsonResponse {
        $productModel = $this->getProduct->execute($product);

        if (!$productModel) {
            return response()->json([
                'message' => 'Không tìm thấy sản phẩm.',
            ], 404);
        }

        $mediaModel = $this->getMedia->execute($media);

        if (
            !$mediaModel
            || $mediaModel->product_id !== $product
        ) {
            return response()->json([
                'message' => 'Không tìm thấy media thuộc sản phẩm này.',
            ], 404);
        }

        $this->deleteMedia->execute($mediaModel);

        return response()->json([
            'message' => 'Xóa media thành công.',
        ]);
    }
}
