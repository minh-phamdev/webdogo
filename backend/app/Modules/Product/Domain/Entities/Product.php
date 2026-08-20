<?php

namespace App\Modules\Product\Domain\Entities;

use App\Modules\Product\Domain\ValueObjects\{
    Money,
    Dimension,
    Weight,
    Inventory,
    Sku,
    Slug,
    ProductStatus
};

class Product
{
    public function __construct(
        public ?int $id,
        public Sku $sku,
        public ?int $groupId,
        public int $categoryId,
        public int $themeId,
        public int $woodTypeId,
        public ?int $finishId,
        public ?int $artisanId,
        public ProductStatus $status,
        public string $name,
        public ?Slug $slug,
        public ?string $description,
        public Money $price,
        public ?Money $compareAtPrice,
        public Dimension $dimension,
        public ?Weight $weight,
        public bool $isUnique,
        public bool $isHandmade,
        public ?int $craftedYear,
        public Inventory $inventory,
        public ?int $leadTimeDays,
    ) {}
}
