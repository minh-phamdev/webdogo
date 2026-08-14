<?php

namespace App\Modules\Product\Domain\Entities;

class ProductMedia
{
    public function __construct(
        public readonly int $id,
        public readonly int $productId,
        public readonly string $mediaType,
        public readonly string $url,
        public readonly ?string $youtubeVideoId,
        public readonly bool $isThumbnail,
        public readonly int $sortOrder,
    ) {}
}
