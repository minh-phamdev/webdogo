<?php

namespace App\Modules\Product\Domain\ValueObjects;

class Dimension
{
    public function __construct(
        private float $height,
        private ?float $width,
        private ?float $depth
    ) {
        if ($height < 0 || ($width !== null && $width < 0) || ($depth !== null && $depth < 0)) {
            throw new \InvalidArgumentException('Invalid dimension');
        }
    }

    public function volume(): ?float
    {
        if ($this->width === null || $this->depth === null) {
            return null;
        }

        return $this->height * $this->width * $this->depth;
    }
}
