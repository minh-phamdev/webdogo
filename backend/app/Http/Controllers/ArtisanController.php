<?php

namespace App\Http\Controllers;

use App\Models\Artisan;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ArtisanController extends Controller
{
    // DANH SÁCH NGHỆ NHÂN
    // GET /api/artisans

    public function index(Request $request): JsonResponse
    {
        $query = Artisan::query();

        // FILTER THEO TỪ KHÓA
        if ($request->filled('search')) {
            $search = trim($request->search);

            $query->where(function ($q) use ($search) {
                $q->where('full_name', 'ILIKE', "%{$search}%")
                    ->orWhere('craft_village', 'ILIKE', "%{$search}%");
            });
        }

        // FILTER THEO TRẠNG THÁI
        if ($request->has('is_active')) {
            $isActive = filter_var(
                $request->is_active,
                FILTER_VALIDATE_BOOLEAN
            );

            $query->where('is_active', $isActive);
        }

        // FILTER THEO LÀNG NGHỀ
        if ($request->filled('craft_village')) {
            $query->where(
                'craft_village',
                $request->craft_village
            );
        }

        // FILTER THEO SỐ NĂM KINH NGHIỆM TỐI THIỂU
        if ($request->filled('min_years_exp')) {
            $query->where(
                'years_exp',
                '>=',
                $request->min_years_exp
            );
        }

        // FILTER THEO SỐ NĂM KINH NGHIỆM TỐI ĐA
        if ($request->filled('max_years_exp')) {
            $query->where(
                'years_exp',
                '<=',
                $request->max_years_exp
            );
        }

        // SORT
        $allowedSorts = [
            'id',
            'full_name',
            'years_exp',
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
                'desc'
            )
        );

        if (!in_array(
            $sortOrder,
            ['asc', 'desc'],
            true
        )) {
            $sortOrder = 'desc';
        }

        $query->orderBy(
            $sortBy,
            $sortOrder
        );

        // PAGINATION
        $perPage = (int) $request->get(
            'per_page',
            12
        );

        $perPage = min(
            max($perPage, 1),
            100
        );

        $artisans = $query->paginate(
            $perPage
        );

        return response()->json([
            'message' => 'Lấy danh sách nghệ nhân thành công.',
            'data' => $artisans->items(),
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


    // CHI TIẾT NGHỆ NHÂN
    // GET /api/artisans/{artisan}

    public function show(Artisan $artisan): JsonResponse
    {
        return response()->json([
            'message' => 'Lấy thông tin nghệ nhân thành công.',
            'data' => $artisan,
        ]);
    }


    // THÊM NGHỆ NHÂN
    // POST /api/artisans

    public function store(Request $request)
{
    $validated = $request->validate([
        'full_name' => 'required|string|max:255',
        'craft_village' => 'nullable|string|max:255',
        'years_exp' => 'nullable|integer|min:0',
        'bio' => 'nullable|string',
        'avatar_url' => 'nullable|string|max:255',
        'is_active' => 'boolean',
    ]);

    $artisan = Artisan::create($validated);

    return response()->json([
        'message' => 'Tạo nghệ nhân thành công.',
        'data' => $artisan,
    ], 201);
}


    // CẬP NHẬT NGHỆ NHÂN
    // PUT /api/artisans/{artisan}

    public function update(
        Request $request,
        Artisan $artisan
    ): JsonResponse {
        $validated = $request->validate([
            'full_name' => [
                'sometimes',
                'required',
                'string',
                'max:255',
            ],

            'craft_village' => [
                'sometimes',
                'nullable',
                'string',
                'max:255',
            ],

            'years_exp' => [
                'sometimes',
                'nullable',
                'integer',
                'min:0',
            ],

            'bio' => [
                'sometimes',
                'nullable',
                'string',
            ],

            'avatar_url' => [
                'sometimes',
                'nullable',
                'string',
                'max:255',
            ],

            'is_active' => [
                'sometimes',
                'boolean',
            ],
        ]);

        $artisan->update(
            $validated
        );

        return response()->json([
            'message' => 'Cập nhật nghệ nhân thành công.',
            'data' => $artisan->fresh(),
        ]);
    }


    // XÓA NGHỆ NHÂN
    // DELETE /api/artisans/{artisan}

    public function destroy(
        Artisan $artisan
    ): JsonResponse {
        $artisan->delete();

        return response()->json([
            'message' => 'Xóa nghệ nhân thành công.',
        ]);
    }
}
