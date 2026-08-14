<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class ProductController extends Controller
{
    // Danh sách, tìm kiếm và lọc sản phẩm
    // GET /api/products
    public function index(Request $request): JsonResponse
    {
        $query = Product::with([
            'category',
            'group',
            'theme',
            'woodType',
            'finishType',
            'artisan',
            'status',
            'media',
        ]);

        // Tìm kiếm bằng search_vector
        // ?search=phật
        if ($request->filled('search')) {
            $search = trim($request->search);

            $query->whereRaw(
                "search_vector @@ plainto_tsquery('simple', ?)",
                [$search]
            );
        }

        // Lọc theo category
        // ?category_id=1
        if ($request->filled('category_id')) {
            $query->where(
                'category_id',
                $request->category_id
            );
        }

        // Lọc theo group
        // ?group_id=1
        if ($request->filled('group_id')) {
            $query->where(
                'group_id',
                $request->group_id
            );
        }

        // Lọc theo theme
        // ?theme_id=2
        if ($request->filled('theme_id')) {
            $query->where(
                'theme_id',
                $request->theme_id
            );
        }

        // Lọc theo loại gỗ
        // ?wood_type_id=1
        if ($request->filled('wood_type_id')) {
            $query->where(
                'wood_type_id',
                $request->wood_type_id
            );
        }

        // Lọc theo kiểu hoàn thiện
        // ?finish_id=1
        if ($request->filled('finish_id')) {
            $query->where(
                'finish_id',
                $request->finish_id
            );
        }

        // Lọc theo nghệ nhân
        // ?artisan_id=1
        if ($request->filled('artisan_id')) {
            $query->where(
                'artisan_id',
                $request->artisan_id
            );
        }

        // Lọc theo trạng thái
        // ?status_id=2
        if ($request->filled('status_id')) {
            $query->where(
                'status_id',
                $request->status_id
            );
        }

        // Lọc sản phẩm độc bản
        // ?is_unique=true
        if ($request->has('is_unique')) {
            $isUnique = filter_var(
                $request->is_unique,
                FILTER_VALIDATE_BOOLEAN
            );

            $query->where(
                'is_unique',
                $isUnique
            );
        }

        // Lọc sản phẩm thủ công
        // ?is_handmade=true
        if ($request->has('is_handmade')) {
            $isHandmade = filter_var(
                $request->is_handmade,
                FILTER_VALIDATE_BOOLEAN
            );

            $query->where(
                'is_handmade',
                $isHandmade
            );
        }

        // Lọc giá tối thiểu
        // ?min_price=1000000
        if ($request->filled('min_price')) {
            $query->where(
                'price',
                '>=',
                $request->min_price
            );
        }

        // Lọc giá tối đa
        // ?max_price=10000000
        if ($request->filled('max_price')) {
            $query->where(
                'price',
                '<=',
                $request->max_price
            );
        }

        // Lọc chiều cao tối thiểu
        // ?min_height=20
        if ($request->filled('min_height')) {
            $query->where(
                'height_cm',
                '>=',
                $request->min_height
            );
        }

        // Lọc chiều cao tối đa
        // ?max_height=50
        if ($request->filled('max_height')) {
            $query->where(
                'height_cm',
                '<=',
                $request->max_height
            );
        }

        // Lọc chiều rộng tối thiểu
        // ?min_width=20
        if ($request->filled('min_width')) {
            $query->where(
                'width_cm',
                '>=',
                $request->min_width
            );
        }

        // Lọc chiều rộng tối đa
        // ?max_width=50
        if ($request->filled('max_width')) {
            $query->where(
                'width_cm',
                '<=',
                $request->max_width
            );
        }

        // Lọc chiều sâu tối thiểu
        // ?min_depth=10
        if ($request->filled('min_depth')) {
            $query->where(
                'depth_cm',
                '>=',
                $request->min_depth
            );
        }

        // Lọc chiều sâu tối đa
        // ?max_depth=30
        if ($request->filled('max_depth')) {
            $query->where(
                'depth_cm',
                '<=',
                $request->max_depth
            );
        }

        // Lọc trọng lượng tối thiểu
        // ?min_weight=5
        if ($request->filled('min_weight')) {
            $query->where(
                'weight_kg',
                '>=',
                $request->min_weight
            );
        }

        // Lọc trọng lượng tối đa
        // ?max_weight=20
        if ($request->filled('max_weight')) {
            $query->where(
                'weight_kg',
                '<=',
                $request->max_weight
            );
        }

        // Lọc sản phẩm còn hàng
        // ?in_stock=true
        if ($request->has('in_stock')) {
            $inStock = filter_var(
                $request->in_stock,
                FILTER_VALIDATE_BOOLEAN
            );

            if ($inStock) {
                $query->whereColumn(
                    'quantity',
                    '>',
                    'reserved_quantity'
                );
            } else {
                $query->whereColumn(
                    'quantity',
                    '<=',
                    'reserved_quantity'
                );
            }
        }

        // Lọc theo slug
        // ?slug=tuong-dat-ma-go-huong
        if ($request->filled('slug')) {
            $query->where(
                'slug',
                $request->slug
            );
        }

        // Các trường được phép sắp xếp
        $allowedSorts = [
            'id',
            'name',
            'price',
            'created_at',
            'updated_at',
            'quantity',
            'height_cm',
            'width_cm',
            'weight_kg',
        ];

        // Trường sắp xếp mặc định
        // ?sort_by=price
        $sortBy = $request->get(
            'sort_by',
            'created_at'
        );

        if (!in_array(
            $sortBy,
            $allowedSorts,
            true
        )) {
            $sortBy = 'created_at';
        }

        // Thứ tự sắp xếp
        // ?sort_order=asc
        // ?sort_order=desc
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

        // Phân trang
        // ?per_page=12
        $perPage = (int) $request->get(
            'per_page',
            12
        );

        $perPage = min(
            max($perPage, 1),
            100
        );

        $products = $query->paginate(
            $perPage
        );

        return response()->json([
            'message' => 'Lấy danh sách sản phẩm thành công.',
            'data' => $products->items(),
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

    // Chi tiết sản phẩm
    // GET /api/products/{product}
    public function show(Product $product): JsonResponse
    {
        $product->load([
            'category',
            'group',
            'theme',
            'woodType',
            'finishType',
            'artisan',
            'status',
            'media',
        ]);

        return response()->json([
            'message' => 'Lấy thông tin sản phẩm thành công.',
            'data' => $product,
        ]);
    }

    // Tạo sản phẩm
    // POST /api/products
    public function store(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'sku' => [
                'required',
                'string',
                'max:255',
                'unique:products,sku',
            ],

            'group_id' => [
                'nullable',
                'integer',
                'exists:product_groups,id',
            ],

            'category_id' => [
                'required',
                'integer',
                'exists:categories,id',
            ],

            // ĐÚNG: bảng statue_themes
            'theme_id' => [
                'required',
                'integer',
                'exists:statue_themes,id',
            ],

            'wood_type_id' => [
                'required',
                'integer',
                'exists:wood_types,id',
            ],

            'finish_id' => [
                'nullable',
                'integer',
                'exists:finish_types,id',
            ],

            'artisan_id' => [
                'nullable',
                'integer',
                'exists:artisans,id',
            ],

            'status_id' => [
                'required',
                'integer',
                'exists:product_statuses,id',
            ],

            'name' => [
                'required',
                'string',
                'max:255',
            ],

            'slug' => [
                'nullable',
                'string',
                'max:255',
                'unique:products,slug',
            ],

            'description' => [
                'nullable',
                'string',
            ],

            'price' => [
                'required',
                'numeric',
                'min:0',
            ],

            'compare_at_price' => [
                'nullable',
                'numeric',
                'min:0',
            ],

            'height_cm' => [
                'required',
                'numeric',
                'min:0',
            ],

            'width_cm' => [
                'nullable',
                'numeric',
                'min:0',
            ],

            'depth_cm' => [
                'nullable',
                'numeric',
                'min:0',
            ],

            'weight_kg' => [
                'required',
                'numeric',
                'min:0',
            ],

            'is_unique' => [
                'required',
                'boolean',
            ],

            'is_handmade' => [
                'required',
                'boolean',
            ],

            'crafted_year' => [
                'nullable',
                'integer',
                'min:1900',
                'max:2100',
            ],

            'quantity' => [
                'required',
                'integer',
                'min:0',
            ],

            'reserved_quantity' => [
                'required',
                'integer',
                'min:0',
                'lte:quantity',
            ],

            'lead_time_days' => [
                'nullable',
                'integer',
                'min:0',
            ],
        ]);

        // Tự tạo slug từ tên sản phẩm
        if (empty($validated['slug'])) {
            $validated['slug'] = Str::slug(
                $validated['name']
            );
        }

        $product = Product::create(
            $validated
        );

        $product->load([
            'category',
            'group',
            'theme',
            'woodType',
            'finishType',
            'artisan',
            'status',
            'media',
        ]);

        return response()->json([
            'message' => 'Tạo sản phẩm thành công.',
            'data' => $product,
        ], 201);
    }

    // Cập nhật sản phẩm
    // PUT /api/products/{product}
    public function update(
        Request $request,
        Product $product
    ): JsonResponse {
        $validated = $request->validate([
            'sku' => [
                'sometimes',
                'required',
                'string',
                'max:255',
                Rule::unique('products', 'sku')
                    ->ignore($product->id),
            ],

            'group_id' => [
                'sometimes',
                'nullable',
                'integer',
                'exists:product_groups,id',
            ],

            'category_id' => [
                'sometimes',
                'required',
                'integer',
                'exists:categories,id',
            ],

            // ĐÚNG: bảng statue_themes
            'theme_id' => [
                'sometimes',
                'required',
                'integer',
                'exists:statue_themes,id',
            ],

            'wood_type_id' => [
                'sometimes',
                'required',
                'integer',
                'exists:wood_types,id',
            ],

            'finish_id' => [
                'sometimes',
                'nullable',
                'integer',
                'exists:finish_types,id',
            ],

            'artisan_id' => [
                'sometimes',
                'nullable',
                'integer',
                'exists:artisans,id',
            ],

            'status_id' => [
                'sometimes',
                'required',
                'integer',
                'exists:product_statuses,id',
            ],

            'name' => [
                'sometimes',
                'required',
                'string',
                'max:255',
            ],

            'slug' => [
                'sometimes',
                'nullable',
                'string',
                'max:255',
                Rule::unique('products', 'slug')
                    ->ignore($product->id),
            ],

            'description' => [
                'sometimes',
                'nullable',
                'string',
            ],

            'price' => [
                'sometimes',
                'required',
                'numeric',
                'min:0',
            ],

            'compare_at_price' => [
                'sometimes',
                'nullable',
                'numeric',
                'min:0',
            ],

            'height_cm' => [
                'sometimes',
                'required',
                'numeric',
                'min:0',
            ],

            'width_cm' => [
                'sometimes',
                'nullable',
                'numeric',
                'min:0',
            ],

            'depth_cm' => [
                'sometimes',
                'nullable',
                'numeric',
                'min:0',
            ],

            'weight_kg' => [
                'sometimes',
                'required',
                'numeric',
                'min:0',
            ],

            'is_unique' => [
                'sometimes',
                'required',
                'boolean',
            ],

            'is_handmade' => [
                'sometimes',
                'required',
                'boolean',
            ],

            'crafted_year' => [
                'sometimes',
                'nullable',
                'integer',
                'min:1900',
                'max:2100',
            ],

            'quantity' => [
                'sometimes',
                'required',
                'integer',
                'min:0',
            ],

            'reserved_quantity' => [
                'sometimes',
                'required',
                'integer',
                'min:0',
            ],

            'lead_time_days' => [
                'sometimes',
                'nullable',
                'integer',
                'min:0',
            ],
        ]);

        // Kiểm tra reserved_quantity không vượt quá quantity
        if (
            array_key_exists('quantity', $validated)
            || array_key_exists('reserved_quantity', $validated)
        ) {
            $quantity = $validated['quantity']
                ?? $product->quantity;

            $reservedQuantity = $validated['reserved_quantity']
                ?? $product->reserved_quantity;

            if ($reservedQuantity > $quantity) {
                return response()->json([
                    'message' =>
                        'reserved_quantity không được lớn hơn quantity.',
                ], 422);
            }
        }

        // Tạo lại slug khi tên sản phẩm thay đổi
        if (
            array_key_exists('name', $validated)
            && !array_key_exists('slug', $validated)
        ) {
            $validated['slug'] = Str::slug(
                $validated['name']
            );
        }

        $product->update(
            $validated
        );

        $product->load([
            'category',
            'group',
            'theme',
            'woodType',
            'finishType',
            'artisan',
            'status',
            'media',
        ]);

        return response()->json([
            'message' => 'Cập nhật sản phẩm thành công.',
            'data' => $product,
        ]);
    }

    // Xóa sản phẩm
    // DELETE /api/products/{product}
    public function destroy(Product $product): JsonResponse
    {
        $product->delete();

        return response()->json([
            'message' => 'Xóa sản phẩm thành công.',
        ]);
    }
}
