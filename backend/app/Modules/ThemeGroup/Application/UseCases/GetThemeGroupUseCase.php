<?php

namespace App\Modules\ThemeGroup\Application\UseCases;

use App\Modules\ThemeGroup\Domain\Repositories\ThemeGroupRepositoryInterface;
use App\Modules\ThemeGroup\Infrastructure\Persistence\Models\ThemeGroupModel;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class GetThemeGroupUseCase
{
    public function __construct(
        private ThemeGroupRepositoryInterface $repository
    ) {}

    public function execute(int $id): ThemeGroupModel
    {
        $themeGroup = $this->repository->find($id);

        if (!$themeGroup) {
            throw (new ModelNotFoundException)
                ->setModel(ThemeGroupModel::class, [$id]);
        }

        return $themeGroup;
    }
}
