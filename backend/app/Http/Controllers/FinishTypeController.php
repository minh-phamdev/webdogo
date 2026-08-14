<?php

namespace App\Http\Controllers;

use App\Models\FinishType;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class FinishTypeController extends Controller
{
    //DANH SÁCH

    public function index(): JsonResponse
    {
        $finishTypes = FinishType::orderBy('id')->get();

        return response()->json([
            'message' => 'Lấy danh sách kiểu hoàn thiện thành công.',
            'data' => $finishTypes,
        ]);
    }


    //CHI TIẾT

    public function show(FinishType $finishType): JsonResponse
    {
        return response()->json([
            'message' => 'Lấy thông tin kiểu hoàn thiện thành công.',
            'data' => $finishType,
        ]);
    }


    //TẠO MỚI

    public function store(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'code' => [
                'required',
                'string',
                'max:50',
                'unique:finish_types,code',
            ],
            'name' => [
                'required',
                'string',
                'max:255',
            ],
        ]);

        $finishType = FinishType::create($validated);

        return response()->json([
            'message' => 'Tạo kiểu hoàn thiện thành công.',
            'data' => $finishType,
        ], 201);
    }


    //CẬP NHẬT

    public function update(
        Request $request,
        FinishType $finishType
    ): JsonResponse {
        $validated = $request->validate([
            'code' => [
                'sometimes',
                'string',
                'max:50',
                'unique:finish_types,code,' . $finishType->id,
            ],
            'name' => [
                'sometimes',
                'string',
                'max:255',
            ],
        ]);

        $finishType->update($validated);

        return response()->json([
            'message' => 'Cập nhật kiểu hoàn thiện thành công.',
            'data' => $finishType,
        ]);
    }


    //XÓA

    public function destroy(FinishType $finishType): JsonResponse
    {
        $finishType->delete();

        return response()->json([
            'message' => 'Xóa kiểu hoàn thiện thành công.',
        ]);
    }
}
