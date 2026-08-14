<?php

namespace App\Http\Controllers;

use App\Models\ThemeGroup;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ThemeGroupController extends Controller
{
    //DANH SÁCH THEME GROUP

    public function index(Request $request): JsonResponse
    {
        $query = ThemeGroup::with('themes');

        //SEARCH

        if ($request->filled('search')) {
            $search = trim($request->search);

            $query->where(function ($q) use ($search) {
                $q->where('name', 'ILIKE', "%{$search}%")
                    ->orWhere('code', 'ILIKE', "%{$search}%");
            });
        }

        //FILTER THEO CODE

        $query->when(
            $request->filled('code'),
            fn ($q) => $q->where(
                'code',
                $request->code
            )
        );

        //SORT

        $allowedSorts = [
            'id',
            'name',
            'code',
        ];

        $sortBy = $request->get(
            'sort_by',
            'id'
        );

        if (!in_array($sortBy, $allowedSorts, true)) {
            $sortBy = 'id';
        }

        $sortOrder = strtolower(
            $request->get(
                'sort_order',
                'asc'
            )
        );

        if (!in_array($sortOrder, ['asc', 'desc'], true)) {
            $sortOrder = 'asc';
        }

        $query->orderBy(
            $sortBy,
            $sortOrder
        );

        //PAGINATION

        $perPage = (int) $request->get(
            'per_page',
            12
        );

        $perPage = min(
            max($perPage, 1),
            100
        );

        $themeGroups = $query->paginate($perPage);

        //RESPONSE

        return response()->json([
            'message' => 'Lấy danh sách nhóm chủ đề thành công.',
            'data' => $themeGroups->items(),
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


    //CHI TIẾT THEME GROUP

    public function show(ThemeGroup $themeGroup): JsonResponse
    {
        $themeGroup->load([
            'themes',
        ]);

        return response()->json([
            'message' => 'Lấy thông tin nhóm chủ đề thành công.',
            'data' => $themeGroup,
        ]);
    }


    //TẠO THEME GROUP

    public function store(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'name' => [
                'required',
                'string',
                'max:255',
                'unique:theme_groups,name',
            ],

            'code' => [
                'required',
                'string',
                'max:100',
                'unique:theme_groups,code',
            ],
        ]);

        $themeGroup = ThemeGroup::create($validated);

        return response()->json([
            'message' => 'Tạo nhóm chủ đề thành công.',
            'data' => $themeGroup,
        ], 201);
    }


    //CẬP NHẬT THEME GROUP

    public function update(
        Request $request,
        ThemeGroup $themeGroup
    ): JsonResponse {
        $validated = $request->validate([
            'name' => [
                'required',
                'string',
                'max:255',
                'unique:theme_groups,name,' . $themeGroup->id,
            ],

            'code' => [
                'required',
                'string',
                'max:100',
                'unique:theme_groups,code,' . $themeGroup->id,
            ],
        ]);

        $themeGroup->update($validated);

        return response()->json([
            'message' => 'Cập nhật nhóm chủ đề thành công.',
            'data' => $themeGroup->fresh(),
        ]);
    }


    //XÓA THEME GROUP

    public function destroy(ThemeGroup $themeGroup): JsonResponse
    {
        //KIỂM TRA THEME ĐANG SỬ DỤNG

        if ($themeGroup->themes()->exists()) {
            return response()->json([
                'message' => 'Không thể xóa nhóm chủ đề đang được sử dụng.',
            ], 409);
        }

        $themeGroup->delete();

        return response()->json([
            'message' => 'Xóa nhóm chủ đề thành công.',
        ]);
    }
}
