<?php

namespace App\Modules\ThemeGroup\Application\UseCases;

use App\Modules\ThemeGroup\Domain\Repositories\ThemeGroupRepositoryInterface;
use App\Modules\ThemeGroup\Infrastructure\Persistence\Models\ThemeGroupModel;

class DeleteThemeGroupUseCase
{
    public function __construct(
        private ThemeGroupRepositoryInterface $repository
    ) {}

    public function execute(
        ThemeGroupModel $themeGroup
    ): bool {
        return $this->repository->delete(
            $themeGroup
        );
    }
}
