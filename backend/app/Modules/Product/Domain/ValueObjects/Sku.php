<?php

namespace App\Modules\Product\Domain\ValueObjects;

class Sku
{
    public function __construct(private string $value)
    {
        if (empty($value)) {
            throw new \InvalidArgumentException('SKU cannot be empty');
        }
    }

    public function value(): string
    {
        return $this->value;
    }
}
