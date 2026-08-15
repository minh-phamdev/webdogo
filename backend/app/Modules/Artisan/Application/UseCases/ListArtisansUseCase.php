<?php

namespace App\Modules\Artisan\Application\UseCases;

use App\Modules\Artisan\Domain\Repositories\ArtisanRepositoryInterface;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class ListArtisansUseCase
{
    public function __construct(
        private ArtisanRepositoryInterface $repository
    ) {}

    public function execute(
        array $filters
    ): LengthAwarePaginator {
        return $this->repository->paginate(
            $filters
        );
    }
}
