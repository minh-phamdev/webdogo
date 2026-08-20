<?php

namespace App\Modules\Product\Domain\ValueObjects;

class Money
{
    public function __construct(
        private int $amount, // dùng int tránh lỗi float
        private string $currency = 'VND'
    ) {
        if ($amount < 0) {
            throw new \InvalidArgumentException('Money cannot be negative');
        }
    }

    public function amount(): int
    {
        return $this->amount;
    }

    public function currency(): string
    {
        return $this->currency;
    }
}
