<?php

namespace App\Modules\Artisan\Domain\Repositories;

use App\Modules\Artisan\Infrastructure\Persistence\Models\ArtisanModel;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

interface ArtisanRepositoryInterface
{
    public function paginate(
        array $filters
    ): LengthAwarePaginator;

    public function find(
        int $id
    ): ?ArtisanModel;

    public function create(
        array $data
    ): ArtisanModel;

    public function update(
        ArtisanModel $artisan,
        array $data
    ): ArtisanModel;

    public function delete(
        ArtisanModel $artisan
    ): bool;
}
