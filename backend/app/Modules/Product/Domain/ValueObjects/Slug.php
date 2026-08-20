<?php

namespace App\Modules\Product\Domain\ValueObjects;

class Slug
{
    public function __construct(private string $value)
    {
        if (!preg_match('/^[a-z0-9-]+$/', $value)) {
            throw new \InvalidArgumentException('Invalid slug');
        }
    }

    public function value(): string
    {
        return $this->value;
    }
}
