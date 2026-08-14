<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class StatueTheme extends Model
{
    protected $table = 'statue_themes';

    protected $fillable = [
        'theme_group_id',
        'code',
        'name',
        'meaning',
    ];

    public function themeGroup(): BelongsTo
    {
        return $this->belongsTo(
            ThemeGroup::class,
            'theme_group_id'
        );
    }
}
