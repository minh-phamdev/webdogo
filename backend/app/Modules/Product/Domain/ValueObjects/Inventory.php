<?php

namespace App\Modules\Product\Domain\ValueObjects;

class Inventory
{
    public function __construct(
        private int $total,
        private int $reserved
    ) {
        if ($total < 0 || $reserved < 0 || $reserved > $total) {
            throw new \InvalidArgumentException('Invalid inventory');
        }
    }

    public function available(): int
    {
        return $this->total - $this->reserved;
    }
}
