<?php

namespace App\Modules\FinishType\Domain\Entities;

class FinishType
{
    public function __construct(
        public readonly ?int $id,
        public readonly string $code,
        public readonly string $name,
    ) {
    }
}
