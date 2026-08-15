<?php

namespace App\Modules\FinishType\Infrastructure\Persistence\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Modules\Product\Infrastructure\Persistence\Models\ProductModel;

class FinishTypeModel extends Model
{
    protected $table = 'finish_types';

    public $timestamps = false;

    protected $fillable = [
        'code',
        'name',
    ];

    public function products(): HasMany
    {
        return $this->hasMany(
            ProductModel::class,
            'finish_id'
        );
    }
}
