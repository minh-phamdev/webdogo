<?php

namespace App\Modules\Product\Interfaces\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Product\Application\DTOs\CreateProductDTO;
use App\Modules\Product\Application\DTOs\UpdateProductDTO;
use App\Modules\Product\Application\UseCases\CreateProductUseCase;
use App\Modules\Product\Application\UseCases\DeleteProductUseCase;
use App\Modules\Product\Application\UseCases\GetProductUseCase;
use App\Modules\Product\Application\UseCases\ListProductsUseCase;
use App\Modules\Product\Application\UseCases\UpdateProductUseCase;
use App\Modules\Product\Interfaces\Http\Requests\StoreProductRequest;
use App\Modules\Product\Interfaces\Http\Requests\UpdateProductRequest;
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
     *
     * Danh sách sản phẩm.
     */
    public function index(
        Request $request
    ): JsonResponse {
        $products = $this->listProducts->execute(
            $request->query()
        );

        return response()->json([
            'message' => 'Lấy danh sách sản phẩm thành công.',

            'data' => ProductResource::collection(
                $products->items()
            ),

            'meta' => [
                'current_page' => $products->currentPage(),
                'per_page' => $products->perPage(),
                'total' => $products->total(),
                'last_page' => $products->lastPage(),
                'from' => $products->firstItem(),
                'to' => $products->lastItem(),
            ],
        ]);
    }

    /**
     * GET /api/products/{product}
     *
     * Chi tiết sản phẩm.
     */
    public function show(
        int $product
    ): JsonResponse {
        $productModel = $this->getProduct->execute(
            $product
        );

        if (!$productModel) {
            return response()->json([
                'message' => 'Không tìm thấy sản phẩm.',
            ], 404);
        }

        return response()->json([
            'message' => 'Lấy thông tin sản phẩm thành công.',

            'data' => new ProductResource(
                $productModel
            ),
        ]);
    }

    /**
     * POST /api/products
     *
     * Tạo sản phẩm.
     */
    public function store(
        StoreProductRequest $request
    ): JsonResponse {
        $product = $this->createProduct->execute(
            new CreateProductDTO(
                $request->validated()
            )
        );

        return response()->json([
            'message' => 'Tạo sản phẩm thành công.',

            'data' => new ProductResource(
                $product
            ),
        ], 201);
    }

    /**
     * PUT/PATCH /api/products/{product}
     *
     * Cập nhật sản phẩm.
     */
    public function update(
        UpdateProductRequest $request,
        int $product
    ): JsonResponse {
        /*
         * Lấy sản phẩm hiện tại.
         */
        $productModel = $this->getProduct->execute(
            $product
        );

        /*
         * Không tìm thấy sản phẩm.
         */
        if (!$productModel) {
            return response()->json([
                'message' => 'Không tìm thấy sản phẩm.',
            ], 404);
        }

        /*
         * Cập nhật sản phẩm.
         */
        $productModel = $this->updateProduct->execute(
            new UpdateProductDTO(
                $productModel,
                $request->validated()
            )
        );

        return response()->json([
            'message' => 'Cập nhật sản phẩm thành công.',

            'data' => new ProductResource(
                $productModel
            ),
        ]);
    }

    /**
     * DELETE /api/products/{product}
     *
     * Xóa mềm sản phẩm.
     */
    public function destroy(
        int $product
    ): JsonResponse {
        /*
         * Lấy sản phẩm.
         */
        $productModel = $this->getProduct->execute(
            $product
        );

        /*
         * Không tìm thấy sản phẩm.
         */
        if (!$productModel) {
            return response()->json([
                'message' => 'Không tìm thấy sản phẩm.',
            ], 404);
        }

        /*
         * Xóa sản phẩm.
         */
        $this->deleteProduct->execute(
            $productModel
        );

        return response()->json([
            'message' => 'Xóa sản phẩm thành công.',
        ]);
    }
}
