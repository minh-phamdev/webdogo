<?php

namespace App\Modules\Theme\Application\UseCases;

use App\Modules\Theme\Application\DTOs\UpdateThemeDTO;
use App\Modules\Theme\Domain\Repositories\ThemeRepositoryInterface;
use App\Modules\Theme\Infrastructure\Persistence\Models\ThemeModel;

class UpdateThemeUseCase
{
    public function __construct(
        private ThemeRepositoryInterface $repository
    ) {}

    public function execute(
        UpdateThemeDTO $dto
    ): ThemeModel {
        return $this->repository->update(
            $dto->theme,
            $dto->data
        );
    }
}
