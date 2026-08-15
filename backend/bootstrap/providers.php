<?php

return [
    App\Providers\AppServiceProvider::class,

    App\Modules\Product\ProductServiceProvider::class,

    App\Modules\Category\CategoryServiceProvider::class,

    App\Modules\Artisan\ArtisanServiceProvider::class,

    App\Modules\ProductGroup\ProductGroupServiceProvider::class,

    App\Modules\ThemeGroup\ThemeGroupServiceProvider::class,

    App\Modules\Theme\ThemeServiceProvider::class,

    App\Modules\StatueTheme\StatueThemeServiceProvider::class,

    App\Modules\WoodType\WoodTypeServiceProvider::class,

    App\Modules\FinishType\FinishTypeServiceProvider::class,

    App\Modules\ProductStatus\ProductStatusServiceProvider::class,
];
