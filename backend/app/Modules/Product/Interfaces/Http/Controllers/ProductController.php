<?php

namespace App\Modules\Product\Interfaces\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Product\Application\DTOs\{
    CreateProductDTO,
    UpdateProductDTO,
    ProductFilterDTO
};
use App\Modules\Product\Application\UseCases\Product\{
    CreateProductUseCase,
    DeleteProductUseCase,
    GetProductUseCase,
    ListProductsUseCase,
    UpdateProductUseCase
};
use App\Modules\Product\Interfaces\Http\Requests\{
    StoreProductRequest,
    UpdateProductRequest
};
use App\Modules\Product\Interfaces\Http\Resources\ProductResource;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function __construct(
        private ListProductsUseCase $listProducts,
        private GetProductUseCase $getProduct,
        private CreateProductUseCase $createProduct,
        private UpdateProductUseCase $updateProduct,
        private DeleteProductUseCase $deleteProduct,
    ) {}

    /**
     * GET /api/products
     */
    public function index(Request $request): JsonResponse
    {
        $dto = new ProductFilterDTO(
            categoryId: $request->query('category_id'),
            statusId: $request->query('status_id'),
            page: $request->query('page', 1),
            perPage: $request->query('per_page', 10),
        );

        $result = $this->listProducts->execute($dto);

        return response()->json([
            'message' => 'Lấy danh sách sản phẩm thành công.',
            'data' => ProductResource::collection($result->items()),
            'meta' => [
                'current_page' => $result->currentPage(),
                'per_page' => $result->perPage(),
                'total' => $result->total(),
                'last_page' => $result->lastPage(),
                'from' => $result->firstItem(),
                'to' => $result->lastItem(),
            ],
        ]);
    }

    /**
     * GET /api/products/{id}
     */
    public function show(int $id): JsonResponse
    {
        $product = $this->getProduct->execute($id);

        if (!$product) {
            return response()->json([
                'message' => 'Không tìm thấy sản phẩm.',
            ], 404);
        }

        return response()->json([
            'message' => 'Lấy thông tin sản phẩm thành công.',
            'data' => new ProductResource($product),
        ]);
    }

    /**
     * POST /api/products
     */
    public function store(StoreProductRequest $request): JsonResponse
    {
        $dto = CreateProductDTO::fromArray(
            $request->validated()
        );

        $product = $this->createProduct->execute($dto);

        return response()->json([
            'message' => 'Tạo sản phẩm thành công.',
            'data' => new ProductResource($product),
        ], 201);
    }

    /**
     * PUT/PATCH /api/products/{id}
     */
    public function update(
        UpdateProductRequest $request,
        int $id
    ): JsonResponse {

        $dto = UpdateProductDTO::fromArray(
            $id,
            $request->validated()
        );

        $product = $this->updateProduct->execute($dto);

        return response()->json([
            'message' => 'Cập nhật sản phẩm thành công.',
            'data' => new ProductResource($product),
        ]);
    }

    /**
     * DELETE /api/products/{id}
     */
    public function destroy(int $id): JsonResponse
    {
        $this->deleteProduct->execute($id);

        return response()->json([
            'message' => 'Xóa sản phẩm thành công.',
        ]);
    }
}
