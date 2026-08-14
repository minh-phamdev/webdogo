<?php

namespace App\Modules\Product\Infrastructure\Persistence\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProductMediaModel extends Model
{
    protected $table = 'product_media';

    protected $fillable = [
        'product_id',
        'media_type',
        'url',
        'youtube_video_id',
        'is_thumbnail',
        'sort_order',
    ];

    protected $casts = [
        'product_id' => 'integer',
        'is_thumbnail' => 'boolean',
        'sort_order' => 'integer',
    ];

    /**
     * Media thuộc về Product.
     */
    public function product(): BelongsTo
    {
        return $this->belongsTo(
            ProductModel::class,
            'product_id'
        );
    }
}
