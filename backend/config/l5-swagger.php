<?php

return [
        'paths' => [
        'docs_json' => 'api-docs.json',
        'docs_yaml' => 'api-docs.yaml',
        'format_to_use_for_docs' => 'json',

        'annotations' => [
            base_path('app/Swagger'),
            base_path('app/Modules'),
        ],
    ],

];
