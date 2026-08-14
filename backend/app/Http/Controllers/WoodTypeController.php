<?php

namespace App\Http\Controllers;

use App\Models\WoodType;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class WoodTypeController extends Controller
{
    // DANH SÁCH LOẠI GỖ

    // GET /api/wood-types
    public function index(): JsonResponse
    {
        $woodTypes = WoodType::orderBy('id')->get();

        return response()->json([
            'message' => 'Lấy danh sách loại gỗ thành công.',
            'data' => $woodTypes,
        ]);
    }


    // CHI TIẾT LOẠI GỖ

    // GET /api/wood-types/{woodType}
    public function show(WoodType $woodType): JsonResponse
    {
        return response()->json([
            'message' => 'Lấy thông tin loại gỗ thành công.',
            'data' => $woodType,
        ]);
    }


    // TẠO LOẠI GỖ

    // POST /api/wood-types
    public function store(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'code' => [
                'required',
                'string',
                'max:50',
                'unique:wood_types,code',
            ],
            'name' => [
                'required',
                'string',
                'max:255',
            ],
            'group_no' => [
                'nullable',
                'integer',
                'min:1',
            ],
            'is_precious' => [
                'boolean',
            ],
            'is_restricted' => [
                'boolean',
            ],
            'description' => [
                'nullable',
                'string',
            ],
        ]);

        $woodType = WoodType::create($validated);

        return response()->json([
            'message' => 'Tạo loại gỗ thành công.',
            'data' => $woodType,
        ], 201);
    }


    // CẬP NHẬT LOẠI GỖ

    // PUT /api/wood-types/{woodType}
    public function update(
        Request $request,
        WoodType $woodType
    ): JsonResponse {
        $validated = $request->validate([
            'code' => [
                'sometimes',
                'required',
                'string',
                'max:50',
                Rule::unique('wood_types', 'code')
                    ->ignore($woodType->id),
            ],
            'name' => [
                'sometimes',
                'required',
                'string',
                'max:255',
            ],
            'group_no' => [
                'nullable',
                'integer',
                'min:1',
            ],
            'is_precious' => [
                'boolean',
            ],
            'is_restricted' => [
                'boolean',
            ],
            'description' => [
                'nullable',
                'string',
            ],
        ]);

        $woodType->update($validated);

        return response()->json([
            'message' => 'Cập nhật loại gỗ thành công.',
            'data' => $woodType->fresh(),
        ]);
    }


    // XÓA LOẠI GỖ

    // DELETE /api/wood-types/{woodType}
    public function destroy(WoodType $woodType): JsonResponse
    {
        $woodType->delete();

        return response()->json([
            'message' => 'Xóa loại gỗ thành công.',
        ]);
    }
}
