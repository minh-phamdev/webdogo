<?php

namespace App\Modules\ThemeGroup\Application\UseCases;

use App\Modules\ThemeGroup\Domain\Repositories\ThemeGroupRepositoryInterface;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class ListThemeGroupUseCase
{
    public function __construct(
        private ThemeGroupRepositoryInterface $repository
    ) {}

    public function execute(
        array $filters = []
    ): LengthAwarePaginator {
        return $this->repository->getAll($filters);
    }
}
