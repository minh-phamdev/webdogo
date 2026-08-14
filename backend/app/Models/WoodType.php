<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class WoodType extends Model
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

    protected function casts(): array
    {
        return [
            'group_no' => 'integer',
            'is_precious' => 'boolean',
            'is_restricted' => 'boolean',
        ];
    }

    public function products(): HasMany
    {
        return $this->hasMany(
            Product::class,
            'wood_type_id'
        );
    }
}
