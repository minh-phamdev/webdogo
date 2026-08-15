<?php

namespace App\Modules\ProductStatus\Infrastructure\Persistence\Models;

use Illuminate\Database\Eloquent\Model;

class ProductStatusModel extends Model
{
    protected $table = 'product_statuses';

    protected $primaryKey = 'id';

    public $timestamps = false;

    protected $fillable = [
        'code',
        'name',
    ];

    protected $casts = [
        'id' => 'integer',
    ];
}
