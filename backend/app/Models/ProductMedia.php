<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProductMedia extends Model
{
    protected $table = 'product_media';

    public $timestamps = false;

    protected $fillable = [
        'product_id',
        'media_type',
        'url',
        'youtube_video_id',
        'is_thumbnail',
        'sort_order',
        'created_at',
    ];

    protected function casts(): array
    {
        return [
            'is_thumbnail' => 'boolean',
            'sort_order' => 'integer',
            'created_at' => 'datetime',
        ];
    }

    public function product(): BelongsTo
    {
        return $this->belongsTo(
            Product::class,
            'product_id'
        );
    }
}
