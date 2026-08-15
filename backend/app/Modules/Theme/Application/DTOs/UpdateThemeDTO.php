<?php

namespace App\Modules\Theme\Application\DTOs;

use App\Modules\Theme\Infrastructure\Persistence\Models\ThemeModel;

class UpdateThemeDTO
{
    public function __construct(
        public ThemeModel $theme,
        public array $data
    ) {}
}
