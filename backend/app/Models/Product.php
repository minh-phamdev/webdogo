<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\StatueTheme;

class Product extends Model
{
    use SoftDeletes;

    protected $table = 'products';
    protected $hidden = ['search_vector',];

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

    // CATEGORY
    public function category(): BelongsTo
    {
        return $this->belongsTo(
            Category::class,
            'category_id'
        );
    }

    // PRODUCT GROUP
    public function group(): BelongsTo
    {
        return $this->belongsTo(
            ProductGroup::class,
            'group_id'
        );
    }

    // THEME
    public function theme(): BelongsTo
    {
        return $this->belongsTo(
            StatueTheme::class,
            'theme_id'
        );
    }

    // WOOD TYPE
    public function woodType(): BelongsTo
    {
        return $this->belongsTo(
            WoodType::class,
            'wood_type_id'
        );
    }

    // FINISH TYPE
    public function finishType(): BelongsTo
    {
        return $this->belongsTo(
            FinishType::class,
            'finish_id'
        );
    }

    // ARTISAN
    public function artisan(): BelongsTo
    {
        return $this->belongsTo(
            Artisan::class,
            'artisan_id'
        );
    }

    // PRODUCT STATUS
    public function status(): BelongsTo
    {
        return $this->belongsTo(
            ProductStatus::class,
            'status_id'
        );
    }

    // PRODUCT MEDIA
    public function media(): HasMany
    {
        return $this->hasMany(
            ProductMedia::class,
            'product_id'
        );
    }
}
