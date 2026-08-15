<?php

namespace App\Modules\Artisan\Application\UseCases;

use App\Modules\Artisan\Application\DTOs\CreateArtisanDTO;
use App\Modules\Artisan\Domain\Repositories\ArtisanRepositoryInterface;
use App\Modules\Artisan\Infrastructure\Persistence\Models\ArtisanModel;

class CreateArtisanUseCase
{
    public function __construct(
        private ArtisanRepositoryInterface $repository
    ) {}

    public function execute(
        CreateArtisanDTO $dto
    ): ArtisanModel {
        return $this->repository->create(
            $dto->data
        );
    }
}
