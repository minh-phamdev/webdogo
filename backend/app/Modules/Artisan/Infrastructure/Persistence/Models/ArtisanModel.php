<?php

namespace App\Modules\Artisan\Infrastructure\Persistence\Models;

use App\Modules\Product\Infrastructure\Persistence\Models\ProductModel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ArtisanModel extends Model
{
    protected $table = 'artisans';

    public $timestamps = false;

    protected $fillable = [
        'full_name',
        'craft_village',
        'years_exp',
        'bio',
        'avatar_url',
        'is_active',
    ];

    protected $casts = [
        'years_exp' => 'integer',
        'is_active' => 'boolean',
    ];

    public function products(): HasMany
    {
        return $this->hasMany(
            ProductModel::class,
            'artisan_id'
        );
    }
}
