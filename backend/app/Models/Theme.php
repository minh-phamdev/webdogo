<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Theme extends Model
{
    protected $table = 'themes';

    public $timestamps = false;

    protected $fillable = [
        'theme_group_id',
        'code',
        'name',
        'meaning',
    ];

    //THEME GROUP

    public function themeGroup(): BelongsTo
    {
        return $this->belongsTo(
            ThemeGroup::class,
            'theme_group_id'
        );
    }

    //PRODUCTS

    public function products(): HasMany
    {
        return $this->hasMany(
            Product::class,
            'theme_id'
        );
    }
}
