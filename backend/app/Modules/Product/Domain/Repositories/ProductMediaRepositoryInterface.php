<?php

namespace App\Modules\Product\Domain\Repositories;

use App\Modules\Product\Infrastructure\Persistence\Models\ProductMediaModel;
use Illuminate\Database\Eloquent\Collection;

interface ProductMediaRepositoryInterface
{
    /**
     * Lấy danh sách media của sản phẩm.
     */
    public function getByProductId(
        int $productId
    ): Collection;

    /**
     * Tìm media theo ID.
     */
    public function find(
        int $id
    ): ?ProductMediaModel;

    /**
     * Tạo media.
     */
    public function create(
        array $data
    ): ProductMediaModel;

    /**
     * Cập nhật media.
     */
    public function update(
        ProductMediaModel $media,
        array $data
    ): ProductMediaModel;

    /**
     * Xóa media.
     */
    public function delete(
        ProductMediaModel $media
    ): bool;
}
