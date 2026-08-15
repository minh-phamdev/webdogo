<?php

namespace App\Modules\ThemeGroup\Application\DTOs;

use App\Modules\ThemeGroup\Infrastructure\Persistence\Models\ThemeGroupModel;

class UpdateThemeGroupDTO
{
    public function __construct(
        public ThemeGroupModel $themeGroup,
        public array $data
    ) {}
}
