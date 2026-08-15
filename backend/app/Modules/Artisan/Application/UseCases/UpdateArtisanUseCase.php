<?php

namespace App\Modules\Artisan\Application\UseCases;

use App\Modules\Artisan\Application\DTOs\UpdateArtisanDTO;
use App\Modules\Artisan\Domain\Repositories\ArtisanRepositoryInterface;
use App\Modules\Artisan\Infrastructure\Persistence\Models\ArtisanModel;

class UpdateArtisanUseCase
{
    public function __construct(
        private ArtisanRepositoryInterface $repository
    ) {}

    public function execute(
        UpdateArtisanDTO $dto
    ): ArtisanModel {
        return $this->repository->update(
            $dto->artisan,
            $dto->data
        );
    }
}
