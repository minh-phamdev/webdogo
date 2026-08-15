<?php

namespace App\Modules\WoodType\Infrastructure\Persistence\Models;

use App\Modules\Product\Infrastructure\Persistence\Models\ProductModel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class WoodTypeModel extends Model
{
    protected $table = 'wood_types';

    public $timestamps = false;

    protected $fillable = [
        'code',
        'name',
        'group_no',
        'is_precious',
        'is_restricted',
        'description',
    ];

    protected $casts = [
        'group_no' => 'integer',
        'is_precious' => 'boolean',
        'is_restricted' => 'boolean',
    ];

    public function products(): HasMany
    {
        return $this->hasMany(
            ProductModel::class,
            'wood_type_id'
        );
    }
}
