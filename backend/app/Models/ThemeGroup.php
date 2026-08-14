<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ThemeGroup extends Model
{
    protected $table = 'theme_groups';

    public $timestamps = false;

    protected $fillable = [
        'name',
        'code',
    ];

    //THEMES

    public function themes(): HasMany
    {
        return $this->hasMany(
            Theme::class,
            'theme_group_id'
        );
    }
}
