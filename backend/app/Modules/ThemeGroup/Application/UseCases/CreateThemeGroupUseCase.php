<?php

namespace App\Modules\ThemeGroup\Application\UseCases;

use App\Modules\ThemeGroup\Application\DTOs\CreateThemeGroupDTO;
use App\Modules\ThemeGroup\Domain\Repositories\ThemeGroupRepositoryInterface;
use App\Modules\ThemeGroup\Infrastructure\Persistence\Models\ThemeGroupModel;

class CreateThemeGroupUseCase
{
    public function __construct(
        private ThemeGroupRepositoryInterface $repository
    ) {}

    public function execute(
        CreateThemeGroupDTO $dto
    ): ThemeGroupModel {
        return $this->repository->create(
            $dto->data
        );
    }
}
