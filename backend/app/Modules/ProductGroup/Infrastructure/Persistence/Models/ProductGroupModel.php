<?php

namespace App\Modules\ProductGroup\Infrastructure\Persistence\Models;

use App\Modules\Product\Infrastructure\Persistence\Models\ProductModel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ProductGroupModel extends Model
{
    protected $table = 'product_groups';

    public $timestamps = false;

    protected $fillable = [
        'name',
        'slug',
    ];

    public function products(): HasMany
    {
        return $this->hasMany(
            ProductModel::class,
            'group_id'
        );
    }
}
