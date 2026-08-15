<?php

namespace App\Modules\StatueTheme\Infrastructure\Persistence\Models;

use App\Modules\ThemeGroup\Infrastructure\Persistence\Models\ThemeGroupModel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class StatueThemeModel extends Model
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
            ThemeGroupModel::class,
            'theme_group_id'
        );
    }
}
