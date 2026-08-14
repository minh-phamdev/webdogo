<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class FinishType extends Model
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
            Product::class,
            'finish_id'
        );
    }
}

