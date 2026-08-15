<?php

namespace App\Modules\Artisan\Application\UseCases;

use App\Modules\Artisan\Domain\Repositories\ArtisanRepositoryInterface;
use App\Modules\Artisan\Infrastructure\Persistence\Models\ArtisanModel;

class DeleteArtisanUseCase
{
    public function __construct(
        private ArtisanRepositoryInterface $repository
    ) {}

    public function execute(
        ArtisanModel $artisan
    ): bool {
        return $this->repository->delete(
            $artisan
        );
    }
}
