<?php

namespace App\Modules\Product\Infrastructure\Persistence\Repositories;

use App\Modules\Product\Domain\Repositories\ProductMediaRepositoryInterface;
use App\Modules\Product\Infrastructure\Persistence\Models\ProductMediaModel;
use Illuminate\Database\Eloquent\Collection;

class ProductMediaRepository implements ProductMediaRepositoryInterface
{
    /**
     * Lấy danh sách media của sản phẩm.
     */
    public function getByProductId(
        int $productId
    ): Collection {
        return ProductMediaModel::query()
            ->where('product_id', $productId)
            ->orderBy('sort_order')
            ->orderBy('id')
            ->get();
    }

    /**
     * Tìm media theo ID.
     */
    public function find(
        int $id
    ): ?ProductMediaModel {
        return ProductMediaModel::query()
            ->find($id);
    }

    /**
     * Tạo media.
     */
    public function create(
        array $data
    ): ProductMediaModel {
        if (($data['is_thumbnail'] ?? false) === true) {
            ProductMediaModel::query()
                ->where('product_id', $data['product_id'])
                ->update([
                    'is_thumbnail' => false,
                ]);
        }

        return ProductMediaModel::create(
            $data
        );
    }

    /**
     * Cập nhật media.
     */
    public function update(
        ProductMediaModel $media,
        array $data
    ): ProductMediaModel {
        if (($data['is_thumbnail'] ?? false) === true) {
            ProductMediaModel::query()
                ->where('product_id', $media->product_id)
                ->where('id', '!=', $media->id)
                ->update([
                    'is_thumbnail' => false,
                ]);
        }

        $media->update(
            $data
        );

        return $media->refresh();
    }

    /**
     * Xóa media.
     */
    public function delete(
        ProductMediaModel $media
    ): bool {
        return (bool) $media->delete();
    }
}
