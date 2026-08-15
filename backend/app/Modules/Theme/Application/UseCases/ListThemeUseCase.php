<?php

namespace App\Modules\Theme\Application\UseCases;

use App\Modules\Theme\Domain\Repositories\ThemeRepositoryInterface;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class ListThemeUseCase
{
    public function __construct(
        private ThemeRepositoryInterface $repository
    ) {}

    public function execute(
        array $filters = []
    ): LengthAwarePaginator {
        return $this->repository->getAll($filters);
    }
}
