<?php

namespace App\Http\Controllers;

use App\Models\ProductGroup;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ProductGroupController extends Controller
{
    /**
     * GET /api/product-groups
     */
    public function index(): JsonResponse
    {
        $groups = ProductGroup::orderBy('id')->get();

        return response()->json([
            'message' => 'Lấy danh sách nhóm sản phẩm thành công.',
            'data' => $groups,
        ]);
    }

    /**
     * POST /api/product-groups
     */
    public function store(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'slug' => [
                'required',
                'string',
                'max:255',
                'unique:product_groups,slug',
            ],
        ]);

        $group = ProductGroup::create($validated);

        return response()->json([
            'message' => 'Tạo nhóm sản phẩm thành công.',
            'data' => $group,
        ], 201);
    }

    /**
     * GET /api/product-groups/{productGroup}
     */
    public function show(ProductGroup $productGroup): JsonResponse
    {
        return response()->json([
            'message' => 'Lấy thông tin nhóm sản phẩm thành công.',
            'data' => $productGroup,
        ]);
    }

    /**
     * PUT /api/product-groups/{productGroup}
     */
    public function update(
        Request $request,
        ProductGroup $productGroup
    ): JsonResponse {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'slug' => [
                'required',
                'string',
                'max:255',
                Rule::unique('product_groups', 'slug')
                    ->ignore($productGroup->id),
            ],
        ]);

        $productGroup->update($validated);

        return response()->json([
            'message' => 'Cập nhật nhóm sản phẩm thành công.',
            'data' => $productGroup->fresh(),
        ]);
    }

    /**
     * DELETE /api/product-groups/{productGroup}
     */
    public function destroy(ProductGroup $productGroup): JsonResponse
    {
        $productGroup->delete();

        return response()->json([
            'message' => 'Xóa nhóm sản phẩm thành công.',
        ]);
    }
}
