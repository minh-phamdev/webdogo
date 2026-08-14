<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Artisan extends Model
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
            Product::class,
            'artisan_id'
        );
    }
}
