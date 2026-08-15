<?php

namespace App\Modules\Artisan\Application\UseCases;

use App\Modules\Artisan\Domain\Repositories\ArtisanRepositoryInterface;
use App\Modules\Artisan\Infrastructure\Persistence\Models\ArtisanModel;

class GetArtisanUseCase
{
    public function __construct(
        private ArtisanRepositoryInterface $repository
    ) {}

    public function execute(
        int $id
    ): ?ArtisanModel {
        return $this->repository->find($id);
    }
}
