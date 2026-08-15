<?php

namespace App\Modules\Theme\Infrastructure\Persistence\Models;

use App\Modules\Product\Infrastructure\Persistence\Models\ProductModel;
use App\Modules\ThemeGroup\Infrastructure\Persistence\Models\ThemeGroupModel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ThemeModel extends Model
{
    protected $table = 'themes';

    public $timestamps = false;

    protected $fillable = [
        'theme_group_id',
        'code',
        'name',
        'meaning',
    ];

    public function themeGroup(): BelongsTo
    {
        return $this->belongsTo(
            ThemeGroupModel::class,
            'theme_group_id'
        );
    }

    public function products(): HasMany
    {
        return $this->hasMany(
            ProductModel::class,
            'theme_id'
        );
    }
}
