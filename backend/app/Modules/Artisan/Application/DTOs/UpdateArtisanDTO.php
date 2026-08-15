<?php

namespace App\Modules\Artisan\Application\DTOs;

use App\Modules\Artisan\Infrastructure\Persistence\Models\ArtisanModel;

class UpdateArtisanDTO
{
    public function __construct(
        public ArtisanModel $artisan,
        public array $data
    ) {}
}
