<?php

namespace App\Http\Controllers;

use App\Models\Theme;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ThemeController extends Controller
{
    //DANH SÁCH THEME

    public function index(Request $request): JsonResponse
    {
        $query = Theme::with('themeGroup');

        //FILTER THEO THEME GROUP

        $query->when(
            $request->filled('theme_group_id'),
            fn ($q) => $q->where(
                'theme_group_id',
                $request->theme_group_id
            )
        );

        //FILTER THEO CODE

        $query->when(
            $request->filled('code'),
            fn ($q) => $q->where(
                'code',
                $request->code
            )
        );

        //SEARCH

        if ($request->filled('search')) {
            $search = trim($request->search);

            $query->where(function ($q) use ($search) {
                $q->where('name', 'ILIKE', "%{$search}%")
                    ->orWhere('code', 'ILIKE', "%{$search}%")
                    ->orWhere('meaning', 'ILIKE', "%{$search}%");
            });
        }

        //SORT

        $allowedSorts = [
            'id',
            'code',
            'name',
            'created_at',
            'updated_at',
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

        $themes = $query->paginate($perPage);

        //RESPONSE

        return response()->json([
            'message' => 'Lấy danh sách chủ đề thành công.',
            'data' => $themes->items(),
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


    //CHI TIẾT THEME

    public function show(Theme $theme): JsonResponse
    {
        $theme->load([
            'themeGroup',
        ]);

        return response()->json([
            'message' => 'Lấy thông tin chủ đề thành công.',
            'data' => $theme,
        ]);
    }


    //TẠO THEME

    public function store(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'theme_group_id' => [
                'nullable',
                'integer',
                'exists:theme_groups,id',
            ],

            'code' => [
                'required',
                'string',
                'max:100',
                'unique:themes,code',
            ],

            'name' => [
                'required',
                'string',
                'max:255',
            ],

            'meaning' => [
                'nullable',
                'string',
            ],
        ]);

        $theme = Theme::create($validated);

        $theme->load([
            'themeGroup',
        ]);

        return response()->json([
            'message' => 'Tạo chủ đề thành công.',
            'data' => $theme,
        ], 201);
    }


    //CẬP NHẬT THEME

    public function update(
        Request $request,
        Theme $theme
    ): JsonResponse {
        $validated = $request->validate([
            'theme_group_id' => [
                'nullable',
                'integer',
                'exists:theme_groups,id',
            ],

            'code' => [
                'required',
                'string',
                'max:100',
                'unique:themes,code,' . $theme->id,
            ],

            'name' => [
                'required',
                'string',
                'max:255',
            ],

            'meaning' => [
                'nullable',
                'string',
            ],
        ]);

        $theme->update($validated);

        $theme->load([
            'themeGroup',
        ]);

        return response()->json([
            'message' => 'Cập nhật chủ đề thành công.',
            'data' => $theme,
        ]);
    }


    //XÓA THEME

    public function destroy(Theme $theme): JsonResponse
    {
        //KIỂM TRA THEME ĐANG ĐƯỢC SỬ DỤNG

        if ($theme->products()->exists()) {
            return response()->json([
                'message' => 'Không thể xóa chủ đề đang được sử dụng bởi sản phẩm.',
            ], 409);
        }

        $theme->delete();

        return response()->json([
            'message' => 'Xóa chủ đề thành công.',
        ]);
    }
}
