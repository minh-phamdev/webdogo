<?php

namespace App\Modules\Theme\Application\UseCases;

use App\Modules\Theme\Application\DTOs\CreateThemeDTO;
use App\Modules\Theme\Domain\Repositories\ThemeRepositoryInterface;
use App\Modules\Theme\Infrastructure\Persistence\Models\ThemeModel;

class CreateThemeUseCase
{
    public function __construct(
        private ThemeRepositoryInterface $repository
    ) {}

    public function execute(
        CreateThemeDTO $dto
    ): ThemeModel {
        return $this->repository->create(
            $dto->data
        );
    }
}
