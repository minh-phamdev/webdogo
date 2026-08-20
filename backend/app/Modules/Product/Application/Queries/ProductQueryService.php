<?php
class ProductQueryService
{
    public function paginate(array $filters)
    {
        return ProductModel::query()
            ->when($filters['category'] ?? null, fn($q, $v) => $q->where('category_id', $v))
            ->paginate(10);
    }
}

