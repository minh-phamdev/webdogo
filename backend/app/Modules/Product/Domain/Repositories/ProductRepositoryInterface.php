<?php

namespace App\Modules\Product\Domain\Repositories;

use App\Modules\Product\Infrastructure\Persistence\Models\ProductModel;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

interface ProductRepositoryInterface
{
    /**
     * Lấy danh sách sản phẩm có filter, sort và pagination.
     */
    public function paginate(
        array $filters
    ): LengthAwarePaginator;

    /**
     * Tìm sản phẩm theo ID.
     */
    public function find(
        int $id
    ): ?ProductModel;

    /**
     * Tạo sản phẩm.
     */
    public function create(
        array $data
    ): ProductModel;

    /**
     * Cập nhật sản phẩm.
     */
    public function update(
        ProductModel $product,
        array $data
    ): ProductModel;

    /**
     * Xóa sản phẩm.
     */
    public function delete(
        ProductModel $product
    ): bool;
}
