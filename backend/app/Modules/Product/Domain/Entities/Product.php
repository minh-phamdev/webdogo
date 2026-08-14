<?php

namespace App\Modules\Product\Domain\Entities;

class Product
{
    public function __construct(
        public ?int $id = null,

        public string $sku = '',

        public ?int $groupId = null,

        public int $categoryId = 0,

        public int $themeId = 0,

        public int $woodTypeId = 0,

        public ?int $finishId = null,

        public ?int $artisanId = null,

        public int $statusId = 0,

        public string $name = '',

        public ?string $slug = null,

        public ?string $description = null,

        public float $price = 0,

        public ?float $compareAtPrice = null,

        public float $heightCm = 0,

        public ?float $widthCm = null,

        public ?float $depthCm = null,

        public ?float $weightKg = 0,

        public bool $isUnique = false,

        public bool $isHandmade = false,

        public ?int $craftedYear = null,

        public int $quantity = 0,

        public int $reservedQuantity = 0,

        public ?int $leadTimeDays = null,
    ) {
    }
}
