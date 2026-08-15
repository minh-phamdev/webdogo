<?php

namespace App\Modules\ThemeGroup\Application\UseCases;

use App\Modules\ThemeGroup\Application\DTOs\UpdateThemeGroupDTO;
use App\Modules\ThemeGroup\Domain\Repositories\ThemeGroupRepositoryInterface;
use App\Modules\ThemeGroup\Infrastructure\Persistence\Models\ThemeGroupModel;

class UpdateThemeGroupUseCase
{
    public function __construct(
        private ThemeGroupRepositoryInterface $repository
    ) {}

    public function execute(
        UpdateThemeGroupDTO $dto
    ): ThemeGroupModel {
        return $this->repository->update(
            $dto->themeGroup,
            $dto->data
        );
    }
}
