<?php

namespace App\Modules\Product\Domain\ValueObjects;

class ProductStatus
{
    public const ACTIVE = 1;
    public const INACTIVE = 0;

    public function __construct(private int $value)
    {
        if (!in_array($value, [self::ACTIVE, self::INACTIVE])) {
            throw new \InvalidArgumentException('Invalid status');
        }
    }

    public function value(): int
    {
        return $this->value;
    }
}
