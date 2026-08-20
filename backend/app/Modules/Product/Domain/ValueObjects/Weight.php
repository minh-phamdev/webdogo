<?php

namespace App\Modules\Product\Domain\ValueObjects;

class Weight
{
    public function __construct(private float $kg)
    {
        if ($kg < 0) {
            throw new \InvalidArgumentException('Weight must be positive');
        }
    }

    public function value(): float
    {
        return $this->kg;
    }
}
