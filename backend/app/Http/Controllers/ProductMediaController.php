<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductMedia;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductMediaController extends Controller
{
    /**
     * Danh sách media của sản phẩm
     */
    public function index(Product $product): JsonResponse
    {
        $media = $product->media()
            ->orderBy('sort_order')
            ->orderBy('id')
            ->get();

        return response()->json([
            'message' => 'Lấy danh sách media thành công.',
            'data' => $media,
        ]);
    }

    /**
     * Thêm media
     */
   public function store(Request $request, Product $product): JsonResponse
{
    $validated = $request->validate([
        'media_type' => ['required', 'in:IMAGE,VIDEO'],
        'url' => ['required', 'string', 'max:2048'],
        'youtube_video_id' => ['nullable', 'string', 'max:50'],
        'is_thumbnail' => ['required', 'boolean'],
        'sort_order' => ['required', 'integer', 'min:0'],
    ]);

    $media = $product->media()->create([
        'media_type' => $validated['media_type'],
        'url' => $validated['url'],
        'youtube_video_id' => $validated['youtube_video_id'] ?? null,
        'is_thumbnail' => $validated['is_thumbnail'],
        'sort_order' => $validated['sort_order'],
        'created_at' => now(),
    ]);

    return response()->json([
        'message' => 'Thêm media thành công.',
        'data' => $media,
    ], 201);
}
    /**
     * Xóa media
     */
    public function destroy(Product $product, ProductMedia $media): JsonResponse
    {
        // Đảm bảo media thuộc đúng product
        if ($media->product_id !== $product->id) {
            return response()->json([
                'message' => 'Media không thuộc sản phẩm này.',
            ], 404);
        }

        $media->delete();

        return response()->json([
            'message' => 'Xóa media thành công.',
        ]);
    }
}
