<?php

namespace App\Modules\Product\Infrastructure\Persistence\Models;

use App\Models\Artisan;
use App\Models\Category;
use App\Models\FinishType;
use App\Models\ProductGroup;
use App\Models\ProductStatus;
use App\Models\StatueTheme;
use App\Models\WoodType;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductModel extends Model
{
    use SoftDeletes;

    protected $table = 'products';

    protected $hidden = [
        'search_vector',
    ];

    protected $fillable = [
        'sku',
        'group_id',
        'category_id',
        'theme_id',
        'wood_type_id',
        'finish_id',
        'artisan_id',
        'status_id',
        'name',
        'slug',
        'description',
        'price',
        'compare_at_price',
        'height_cm',
        'width_cm',
        'depth_cm',
        'weight_kg',
        'is_unique',
        'is_handmade',
        'crafted_year',
        'quantity',
        'reserved_quantity',
        'lead_time_days',
    ];

    protected $casts = [
        'price' => 'decimal:2',
        'compare_at_price' => 'decimal:2',

        'height_cm' => 'decimal:2',
        'width_cm' => 'decimal:2',
        'depth_cm' => 'decimal:2',
        'weight_kg' => 'decimal:2',

        'is_unique' => 'boolean',
        'is_handmade' => 'boolean',

        'crafted_year' => 'integer',
        'quantity' => 'integer',
        'reserved_quantity' => 'integer',
        'lead_time_days' => 'integer',
    ];

    /**
     * Category.
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(
            Category::class,
            'category_id'
        );
    }

    /**
     * Product Group.
     */
    public function group(): BelongsTo
    {
        return $this->belongsTo(
            ProductGroup::class,
            'group_id'
        );
    }

    /**
     * Statue Theme.
     */
    public function theme(): BelongsTo
    {
        return $this->belongsTo(
            StatueTheme::class,
            'theme_id'
        );
    }

    /**
     * Wood Type.
     */
    public function woodType(): BelongsTo
    {
        return $this->belongsTo(
            WoodType::class,
            'wood_type_id'
        );
    }

    /**
     * Finish Type.
     */
    public function finishType(): BelongsTo
    {
        return $this->belongsTo(
            FinishType::class,
            'finish_id'
        );
    }

    /**
     * Artisan.
     */
    public function artisan(): BelongsTo
    {
        return $this->belongsTo(
            Artisan::class,
            'artisan_id'
        );
    }

    /**
     * Product Status.
     */
    public function status(): BelongsTo
    {
        return $this->belongsTo(
            ProductStatus::class,
            'status_id'
        );
    }

    /**
     * Product Media.
     */
    public function media(): HasMany
    {
        return $this->hasMany(
            ProductMediaModel::class,
            'product_id'
        );
    }
}
